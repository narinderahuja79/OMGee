<?php
	class Webservice_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
	  public function getNumRows($table, $where=array())
      {
          if(count($where) > 0)
          {
              $query = $this->db->select('user_id')->where($where)->get($table);
              $numRows = $query->num_rows();
          }
          else
          {
              $query = $this->db->select('user_id')->get($table);
              $numRows = $query->num_rows();   
          }
           // echo $this->db->last_query();
          return $numRows;
      }

      function getdata($table)
      {
        $q = $this->db->get($table);
        return $q->result();
      }

		function get_data_where($table, $where)
        {
        	$this->db->select('*');
          $this->db->where($where);            
          $this->db->from($table);
          // $this->db->order_by("sale_datetime", "DESC");
          $query = $this->db->get();         
          // echo $this->db->last_query();
          $row = $query->result_array();
          return $row;
        }

        function get_product_details($product_id=0, $userid=0)
        {

          $this->db->select('product.*, user.wishlist');
          $this->db->join('user', 'user.wishlist LIKE CONCAT("%",\'"'.$product_id.'"\',"%") AND user.user_id ='.$userid.'', 'left');
          $this->db->where(array('product.product_id'=>$product_id));            
          $this->db->from('product');

          $query = $this->db->get();         
          $row = $query->result_array();

          // echo $this->db->last_query();
          return $row;
        }

    function insert_data($table, $data=array())
    {

        $this->db->insert($table, $data);
        // echo $this->db->last_query(); die();
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function update_data($table, $data=array(), $where=array()) 
    {
        $this->db->where($where);
        $this->db->update($table,$data);
        // echo $this->db->last_query();
        return true;           
    }


     function if_publishable_category($cat_id){
        $category_data = $this->db->get_where('category',array('category_id'=>$cat_id));
        $physical_product_activation = $this->db->get_where('general_settings',array('type'=>'physical_product_activation'))->row()->value;
        $digital_product_activation = $this->db->get_where('general_settings',array('type'=>'digital_product_activation'))->row()->value;
        
        if($category_data->row()->digital == ''){
            if($physical_product_activation !== 'ok'){
                return false;
            }
        } else if($category_data->row()->digital == 'ok'){
            if($digital_product_activation !== 'ok'){
                return false;
            }
        }
        return true;
    }


    function lastOneWeekproduct()
    {
        $latest = $this->db->query("SELECT * FROM product WHERE `created_date` >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND `created_date` < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY ORDER BY product_id DESC");
         
        return  $latest->result_array();
    }

    //IF PRODUCT ADDED TO CART
    function is_added_to_cart($product_id, $set = '', $op = '')
    {
      $carted = $this->cart->contents();
      // var_dump($carted);
      if (count($carted) > 0) {
          foreach ($carted as $items) {
              if ($items['id'] == $product_id) {
                if ($set == '') {
                    return true;
                } else {
                    if($set == 'option'){
                        $option = json_decode($items[$set],true);
                        return $option[$op]['value'];
                    } else {
                        return $items[$set];
                    }
                }
            }
          }
      } else {
          return false;
      }
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name')
    {
      if ($type_id != '') {
        $l = $this->db->get_where($type, array(
            $type . '_id' => $type_id
        ));
        $n = $l->num_rows();
        if ($n > 0) {
            return $l->row()->$field;
        }
      }
    }

    function get_data($table='',$where= array(), $field = '*')
    {
      if ($table != '') {
        $l = $this->db->get_where($table, $where);
        $n = $l->num_rows();
        if ($n > 0) {
            return $l->row()->$field;
        }
      }
    }

    function is_wished($product_id,$user_id){
      // if ($this->session->userdata('user_login') == 'yes') {
      if ($user_id > 0) {
          // $user = $this->session->userdata('user_id');

          $wished = array('0');
          if ($this->get_type_name_by_id('user', $user_id, 'wishlist') !== '') {
              $wished = json_decode($this->get_type_name_by_id('user', $user_id, 'wishlist'));
          } else {
              $wished = array(
                  '0'
              );
          }
          if(!empty($wished)){
            if (in_array($product_id, $wished)) {
              return 'yes';
            } else {
                return 'no';
            }  
          }else{
            return 'no';
          }
          // echo "<pre>"; print_r($wished);die;
          
      } else {
        echo "logged out";die();
          return 'no';
      }
    }
    

    function add_wish($product_id,$user_id)
    {
      // $user = $this->session->userdata('user_id');
      if ($this->get_type_name_by_id('user', $user_id, 'wishlist') !== 'null') {
          $wished = json_decode($this->get_type_name_by_id('user', $user_id, 'wishlist'));
      } else {
          $wished = array();
      }
      if ($this->is_wished($product_id,$user_id) == 'no') {
          array_push($wished, $product_id);
          $this->db->where('user_id', $user_id);
          $this->db->update('user', array(
              'wishlist' => json_encode($wished)
          ));
      }
    }

    function remove_wish($product_id,$user_id)
    {

      if ($this->get_type_name_by_id('user', $user_id, 'wishlist') !== 'null') {
          $wished = json_decode($this->get_type_name_by_id('user', $user_id, 'wishlist'));
      } else {
          $wished = array();
      }
      $wished_new = array();
      foreach ($wished as $row) {
          if ($row !== $product_id) {
              $wished_new[] = $row;
          }
      }
      $this->db->where('user_id', $user_id);
      $this->db->update('user', array('wishlist' => json_encode($wished_new)));
      $ListData = $this->db->affected_rows();
      return $ListData;
    }



/////////////////////////// START ///////////////////////////////////////




    function is_carted($user_id,$product_id)
    {
      $user_id = 67;
      $product_id = 172;

      if ($user_id > 0) {
          $wished = array('0');

          $dt = $this->get_data('forCart', array('user_id'=>$user_id ),'product_id');
          // echo $this->db->last_query();

          // echo "<pre>aaaa===>";
          // print_r($dt); 

          // die();
          if (!empty($dt)) {
            $dt = $this->get_data('forCart', array('user_id'=>$user_id ),'product_id');
              $wished = json_decode($dt);
          } else {
              $wished = array('0');
          }        
 // print_r($wished);die();
          if(in_array($product_id, $wished)) {
              return 'yes';
          } else {
              return 'no';
          }
      }else {
        echo "logged out";die();
          return 'no';
      }
    }

    function add_cart($user_id,$product_id)
    {
        if ($this->get_type_name_by_id('forCart', $user_id, 'product_id') !== 'null') { 
        $wished = json_decode($this->get_type_name_by_id('forCart', $user_id, 'product_id'));
      } else {
          $wished = array();
        }
        if ($this->is_carted($product_id,$user_id) == 'no') {
          array_push($wished, $product_id);
          $this->db->where('user_id', $user_id);
          $this->db->update('forCart', array(
            'product_id' => json_encode($wished)
          ));
        }
    }



//////////////////////////////// END //////////////////////////////////


    function is_rated($product_id,$user_id)
    {
      // if ($this->session->userdata('user_login') == 'yes') {
      if ($user_id > 0) {
          // $user = $this->session->userdata('user_id');
          $user = $user_id;
          if ($this->get_type_name_by_id('product', $product_id, 'rating_user') !== '') {
              $rating_user = json_decode($this->get_type_name_by_id('product', $product_id, 'rating_user'));
          } else {
              $rating_user = array(
                  '0'
              );
          }
          if (in_array($user, $rating_user)) {
              return 'yes';
          } else {
              return 'no';
          }
      } else {
          return 'no';
      }
    }



    function set_rating($product_id, $rating, $user_id)
    {
      if ($this->is_rated($product_id,$user_id) == 'yes') {
          return 'no';
      }
      
      $total = $this->get_type_name_by_id('product', $product_id, 'rating_total');
      $num   = $this->get_type_name_by_id('product', $product_id, 'rating_num');
      $total = $total + $rating;
      $num   = $num + 1;
      
      // $user  = $this->session->userdata('user_id');
      $user  = $user_id;
      
      $rating_user = json_decode($this->get_type_name_by_id('product', $product_id, 'rating_user'));
      
      if (!is_array($rating_user)) {
          $rating_user = array();
      }
      array_push($rating_user, $user);
      
      $this->db->where('product_id', $product_id);
      $this->db->update('product', array(
          'rating_user' => json_encode($rating_user)
      ));
      $this->db->where('product_id', $product_id);
      $this->db->update('product', array(
          'rating_total' => $total
      ));
      $this->db->where('product_id', $product_id);
      $this->db->update('product', array(
          'rating_num' => $num
      ));
      
      return 'yes';
    }

    function rating($product_id)
    {
        $total = $this->get_type_name_by_id('product', $product_id, 'rating_total');
        $num   = $this->get_type_name_by_id('product', $product_id, 'rating_num');
        if ($num > 0) {
            $number = $total / $num;
            return number_format((float) $number,1, '.', '');
        } else {
            return "0";
        }
    }

    public function deleteRow($table, $where)
    {
      $this->db->where($where);
      $this->db->delete($table);
      $affectedRows = $this->db->affected_rows();
      return $affectedRows;
    }


    function digital_to_customer($sale_id,$user_id){
      $carted = json_decode($this->db->get_where('sale', array(
                  'sale_id' => $sale_id
              ))->row()->product_details, true);
      $user = $this->db->get_where('sale', array(
                  'sale_id' => $sale_id
              ))->row()->buyer;
      $downloads = $this->db->get_where('user', array(
                  'user_id' => $user
                  ))->row()->downloads;
      $result = array();
      // foreach ($carted as $row) {
      //     if($this->is_digital($row['id'])){
      //         $result[] = array('sale'=>$sale_id,'product'=>$row['id']);
      //     }
      // }
      $where = array('user_id'=>$user_id);
      $cartDataInfo = $this->get_data_where('forCart',$where);
      foreach ($cartDataInfo as $row) {
          if($this->is_digital($row['product_id'])){
              $result[] = array('sale'=>$sale_id,'product'=>$row['product_id']);
          }
      }
      if($downloads !== ''){
          $downloads = json_decode($downloads,true);
      } else if($downloads == ''){
          $downloads = json_decode('[]',true);
      }
      $data['downloads'] = json_encode(array_merge($downloads,$result));
      $this->db->where('user_id',$user);
      $this->db->update('user',$data);
    }

    function is_digital($id){
      if($this->db->get_where('product',array('product_id'=>$id))->row()->download == 'ok'){
          return true;
      } else {
          return false;
      }
    }

    function is_sale_of_vendor($sale_id,$vendor_id)
    {
      $return          = array();
      $product_details = json_decode($this->get_type_name_by_id('sale', $sale_id, 'product_details'), true);
      foreach ($product_details as $row) {
          if ($this->is_added_by('product',$row['product_id'],$vendor_id)) {
              $return[] = $row['vendor_id'];
          }
      }
      if (empty($return)) {
          return false;
      } else {
          return $return;
      }
    }

    function vendors_in_sale($sale_id)
    {
      $vendors = $this->db->get('vendor')->result_array();
      $return = array();
      foreach ($vendors as $row) {
          if($this->is_sale_of_vendor($sale_id,$row['vendor_id'])){
            $return[] = $row['vendor_id'];
          }
      }
      return $return;
    }

    function is_added_by($type,$id,$user_id,$user_type = 'vendor')
    {
      $added_by = json_decode($this->db->get_where($type,array($type.'_id'=>$id))->row()->added_by,true);
      // print_r($added_by);
      if($user_type == 'admin'){
          $user_id = $added_by['id'];
      }
      $this->benchmark->mark_time();
      if($added_by['type'] == $user_type && $added_by['id'] == $user_id){
          return true;
      } else {
          return false;
      }
    }

    function is_admin_in_sale($sale_id)
    {
      $return          = array();
      $product_details = json_decode($this->get_type_name_by_id('sale', $sale_id, 'product_details'), true);
      foreach ($product_details as $row) {
      // print_r($row[]);die();
          if ($this->is_added_by('product',$row['product_id'],0,'admin')) {
              $return[] = $row['product_id'];
          }
      }
      if (empty($return)) {
          return false;
      } else {
          return $return;
      }
    }

   function search_product($title){
      $this->db->select('*');
      $this->db->from('product');
      $this->db->like('title', $title);
      $query = $this->db->get();
      // echo $this->db->last_query();
      $row = $query->result_array();
      return $row;
    }


    function searchProduct($search='',$filter="",$brand_id){
      //$filter = newArrival,highToLow,lowToHigh,brands,atoz,ztoa,yearWine,abv,cashback,promotion
      $this->db->select('product.*,brand.brand_id,brand.name as brand_name');
      $this->db->from('product');
      $this->db->join('brand','brand.brand_id = product.brand','left');
      // $this->db->join('cities','cities.id = users.city_id','left');
      if(!empty($brand_id) && $filter=='Brands'){
        $this->db->where('brand.brand_id',$brand_id);  
      }

      if(!empty($brand_id) && $filter=='Brands'){
        $this->db->where('brand.brand_id',$brand_id);  
      }

      
      if(!empty($filter)){
        if($filter=="NewArrivals"){
          $newarrival="`product`.`created_date` >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND `created_date` < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY";

          $this->db->where($newarrival);     
        }else if($filter=="HighToLow"){
          $this->db->order_by('product.bundle_sale1', 'DESC');
        }else if($filter=="LowToHigh"){
          $this->db->order_by('product.bundle_sale1', 'ASC');
        }else if($filter=="AtoZ"){  
          $this->db->order_by('product.title', 'ASC');
        }else if($filter=="ZtoA"){  
          $this->db->order_by('product.title', 'DESC');
        }else if($filter=="Year"){  
          $this->db->order_by('product.bundle_sale1', 'ASC');
        }else if($filter=="ABV"){  
          $this->db->order_by('product.bundle_sale1', 'ASC');
        }else if($filter=="Cashback"){  
          $this->db->order_by('product.bundle_sale1', 'ASC');
        }else if($filter=="Promotion"){  
          $this->db->order_by('product.bundle_sale1', 'ASC');
        }
      }else{
        $this->db->order_by('product.product_id', 'DESC');        
      }

      if(!empty($search)){
        $this->db->where("(product.title LIKE '%".$search."%' OR product.description LIKE '%".$search."%' OR product.bundle_sale1 LIKE '%".$search."%')", NULL, FALSE);  
      }
      
      $query=$this->db->get(); 
      // echo $this->db->last_query();die;
      return $query->result();
    }


    public function vendorProductList($vendor_id)
    {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('status','ok');
      // $this->db->where('vendor_featured','ok');
      $this->db->where('added_by',json_encode(array('type'=>'vendor','id'=>$vendor_id)));
      $query = $this->db->get();
      // echo $this->db->last_query();
      $row = $query->result_array();
      return $row;
    }


    //my code start


    /*
   * @description: This function is used countResult
   * 
   */ 
  
  function countResult($table='',$field='',$value='', $limit=0,$groupBy = ''){
  
    if(is_array($field)){
        $this->db->where($field);
    }
    elseif($field!='' && $value!=''){
      $this->db->where($field, $value);
    } 
    $this->db->from($table);
    if(!empty($groupBy)){
      $this->db->group_by($groupBy);
    }
    
    if($limit >0){
      $this->db->limit($limit);
    }
    
     $res= $this->db->count_all_results();
    // echo $this->db->last_query();
     return $res;
     
  }



  /**
     *  function for get Data From Table
     *  param $table, $field, $whereField, $whereValue, $orderBy, $order, $limit, $offset, $resultInArray
     *  return result row
     **/
  function getDataFromTabel($table, $field='*',  $whereField='', $whereValue='', $orderBy='', $order='ASC', $limit=0, $offset=0, $resultInArray=false, $join = '' , $extracondition = ''){
        
        $this->db->select($field);
        $this->db->from($table);

        if(is_array($whereField)){
            $this->db->where($whereField);
        }elseif(!empty($whereField) && $whereValue != ''){
            $this->db->where($whereField, $whereValue);
        }

        if(!empty($orderBy)){  
            $this->db->order_by($orderBy, $order);
        }
        if($limit > 0){
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get();
        if($resultInArray){
            $result = $query->result_array();
        }else{
            $result = $query->result();
        }
       if(!empty($result)){
            return $result;
        }
        else{
            return FALSE;
        }
  }


  /*
   * @description: This function is used addDataIntoTabel
   * 
   */
  
  function addDataIntoTable($table='', $data=array()){
    $table=$table;
    if($table=='' || !count($data)){
      return false;
    }
    $inserted = $this->db->insert($table , $data);
    $this->db->last_query();
    $ID = $this->db->insert_id();
    return $ID;
  }
    


  /*
   * @description: This function is used updateDataFromTabel
   * 
   */
   
  function updateDataFromTable($table='', $data=array(), $field='', $ID=0){
    $table=$table;
    if(empty($table) || !count($data)){
      return false;
    }
    else{
      if(is_array($field)){
        
        $this->db->where($field);
      }else{
        $this->db->where($field , $ID);
      }
      return $this->db->update($table , $data);
    }
  }


  
     /**
     *  function for update data of table
     *  param $table, $data, $field, $id
     *  return result
     **/
    function updateDataFromTabel($table='', $data=array(), $field='', $id=0){
        if(empty($table) || !count($data)){
            return false;
        }
        else{
            if(is_array($field)){                 
                $this->db->where($field);
            }else{
                $this->db->where($field, $id);
                
            }
            return $this->db->update($table , $data);
        }
    }


     
  
  function getAverage($product_id){
    $sql = "SELECT AVG(`rate`) as rate FROM `rating` WHERE `product_id` = '".$product_id."'";
    $query = $this->db->query($sql);

    // $query = $this->db->get();
    //echo $this->db->last_query();
    // $result = $query->row();
    $res = $query->result_array();
    // echo $this->db->last_query();
    return $res;
     
  }



   function getProductRating($product_id){

        $count = $this->db->get_where('rating',array('product_id' => $product_id))->num_rows();
         $this->db->select_sum('rate');
          $this->db->from('rating');
          $this->db->where(array('product_id' => $product_id));
          $query = $this->db->get();
          $total = $query->row()->rate;

        if ($count > 0) {
            $number = $total / $count;
           return $rating = round($number);
        } else {
           return $rating = 0;
        }
    }

  

    


		
	}// END OF CLASS

?>