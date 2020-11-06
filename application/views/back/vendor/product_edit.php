<?php
    foreach($product_data as $row){
?>
<div class="row">
    <div class="col-md-12">
        <?php
			echo form_open(base_url() . 'vendor/product/update/' . $row['product_id'], array(
				'class' => 'form-horizontal',
				'method' => 'post',
				'id' => 'product_edit',
				'enctype' => 'multipart/form-data'
			));
		?>
            <!--Panel heading-->
            <div class="panel-heading">
                <div class="panel-control" style="float: left;">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#product_details"><?php echo translate('product_details'); ?></a>
                        </li>
                        <li style="display: none;">
                            <a data-toggle="tab" href="#business_details"><?php echo translate('business_details'); ?></a>
                        </li>
                        <li style="display: none;">
                            <a data-toggle="tab" href="#customer_choice_options"><?php echo translate('customer_choice_options'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-base">
                    <!--Tabs Content-->                    
                    <div class="tab-content">
                        <div id="product_details" class="tab-pane fade active in">

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-1">
                                    <?php echo translate('product_title');?>
                                        </label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" id="demo-hor-1" value="<?php echo $row['title']; ?>" placeholder="<?php echo translate('product_title');?>" class="form-control required">
                                </div>
                            </div>

                            <div class="form-group btm_border" style="display: none;">
                                <label class="col-sm-4 control-label" for="demo-hor-81"><?php echo translate('product_type');?></label>
                                <div class="col-sm-6">
                                    <select class="form-control " name="product_type">
                                        <option value="<?php echo $row['product_type']; ?>"><?php echo $row['product_type']; ?></option>
                                        <?php if($row['product_type'] != 'Bottle')  { ?> <option value="Bottle"><?php echo translate('bottle');?></option> <?php } ?>
                                        <?php if($row['product_type'] != 'Cane')  { ?> <option value="Cane"><?php echo translate('cane');?></option> <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-84"><?php echo translate('variety');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="variety" id="demo-hor-84" value="<?php echo $row['variety']; ?>" placeholder="<?php echo translate('variety');?>" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-84"><?php echo translate('is_low_stock');?></label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="is_low_stock" id="demo-hor-84" <?php if($row['is_low_stock']=='yes') { echo 'checked'; } ?> value="yes" placeholder="<?php echo translate('is_low_stock');?>" >Low Stock
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo translate('category');?></label>
                                <div class="col-sm-6">
                                    <?php echo $this->crud_model->select_html('category','category','category_name','edit','demo-chosen-select required',$row['category'],'digital',NULL,'get_cat'); ?>
                                </div>
                            </div>
                            <div class="form-group btm_border" >
                                <label class="col-sm-4 control-label" for="demo-hor-3"><?php echo translate('sub-category');?></label>
                                <div class="col-sm-6" id="sub_cat">
                                    <?php echo $this->crud_model->select_html('sub_category','sub_category','sub_category_name','edit','demo-chosen-select ',$row['sub_category'],'category',$row['category'],'get_brnd'); ?>
                                </div>
                            </div>
                            <div class="form-group btm_border" >
                                <label class="col-sm-4 control-label" for="demo-hor-4"><?php echo translate('brand');?></label>
                                <div class="col-sm-6" >
                                    <?php 
                                    
                                    
                                          echo $this->crud_model->select_html('brand','brand','name','edit','demo-chosen-select',$row['brand'],'brand_id',$brands,'','multi'); 
                                       
                                    ?>
                                </div>
                            </div>
                            <div   class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('unit');?></label>
                                <div class="col-sm-4">
                                    <input type="text" name="unit" id="demo-hor-5" value="<?php echo $row['unit']; ?>" placeholder="<?php echo translate('unit_(e.g._kg,_pc_etc.)'); ?>" class="form-control unit required">
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-82"><?php echo translate('product_abv (%)');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="product_abv" id="demo-hor-82" min="0" max="100" value="<?php echo $row['product_abv']; ?>" placeholder="<?php echo translate('_e.g._23%_per_bottle/can,_etc.'); ?>" class="form-control">
                                </div>
                            </div>           

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-83"><?php echo translate('product_year');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="product_year" id="demo-hor-83" min="0" value="<?php echo $row['product_year']; ?>" placeholder="<?php echo translate('_e.g._2016,_2017,_etc.'); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-83"><?php echo translate('regions');?></label>
                                <div class="col-sm-4">
                                    <input type="text" name="regions" id="demo-hor-83" min="0" value="<?php echo $row['regions']; ?>" placeholder="<?php echo translate('_e.g._Barrosa valley,_Hunter valley,_etc.'); ?>" class="form-control">
                                </div>
                            </div>

                            <div   class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-11"><?php echo translate('tags');?></label>
                                <div class="col-sm-4">
                                    <input type="text" name="tag" data-role="tagsinput" placeholder="<?php echo translate('tags');?>" value="<?php echo $row['tag']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-81"><?php echo translate('limited_release');?></label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="limited_release">
                                         <option value="<?php echo $row['limited_release']; ?>"><?php echo $row['limited_release']; ?></option>
                                        <?php if($row['limited_release'] != 'Yes')  { ?> <option value="Yes"><?php echo translate('yes');?></option> <?php } ?>
                                        <?php if($row['limited_release'] != 'No')  { ?> <option value="No"><?php echo translate('no');?></option> <?php } ?>
                                    </select>
                                </div>
                            </div>

                           <div class="form-group btm_border" >
                                <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('wholesale');?></label>
                                <div class="col-sm-6" >
                                    <input type="number" min="1" name="wholesale" class="form-control" value="<?php echo $row['wholesale']; ?>" >
                                </div>                                
                            </div>
                            <div class="form-group btm_border" >
                                <label class="col-sm-1 control-label" for="demo-hor-5">AU <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_AU" class="form-control required" value="<?php echo $row['sale_price_AU']; ?>">
                                </div> 
                                <label class="col-sm-1 control-label" for="demo-hor-5">HK <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_HK" class="form-control" value="<?php echo $row['sale_price_HK']; ?>">
                                </div>
                                <label class="col-sm-1 control-label" for="demo-hor-5">JP <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_JP" class="form-control" value="<?php echo $row['sale_price_JP']; ?>">
                                </div>
                                <label class="col-sm-1 control-label" for="demo-hor-5">SG <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_SG" class="form-control" value="<?php echo $row['sale_price_SG']; ?>">
                                </div>                              
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('bundle_discount');?> (%)</label>
                                <div class="col-sm-6">
                                    <input type="number" min="1" name="discount" class="form-control" value="<?php echo $row['discount']; ?>">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-12"><?php echo translate('images');?></label>
                                <div class="col-sm-6">
                                    <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                        <input type="file"  multiple name="images[]" onchange="preview(this);" id="demo-hor-inputpass" class="form-control">
                                    </span>
                                    <br><br>
                                    <span id="previewImg" ></span>
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-13"></label>
                                <div class="col-sm-6">
                                    <?php 
                                        $images = explode(",",$row['num_of_imgs']);
                                        if($row['num_of_imgs'])
                                        {
                                            foreach ($images as $value)
                                            {
                                                ?>
                                                    <div class="delete-div-wrap">
                                                         <a href="javascript:void(0);" data-product-id="<?php echo $row['product_id']; ?>" data-id="<?php echo $value; ?>" class="delete-product-img close">&times;</a>    
                                                        <div class="inner-div">
                                                            <img class="img-responsive" width="100" src="<?php echo  base_url('/uploads/product_image/'.$value); ?>" alt="Product Image" >
                                                        </div>
                                                    </div>
                                                <?php 
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="delete-div-wrap">
                                                <div class="inner-div">
                                                    <img class="img-responsive" width="100" src="<?php echo  base_url('/uploads/product_image/default.jpg'); ?>" alt="Product Image" >
                                                </div>
                                            </div>
                                            <?php
                                        } 
                                    ?>
                                    <input type="hidden" name="last_products_images" value="<?php echo $row['num_of_imgs']; ?>">
                                </div>
                            </div>

                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-14">
                                    <?php echo translate('description');?>
                                        </label>
                                <div class="col-sm-6">
                                    <textarea rows="9" class="summernotes" data-height="200" data-name="description">
                                        <?php echo $row['description']; ?></textarea>
                                </div>
                            </div>
                            <?php
                                $all_af = $this->crud_model->get_additional_fields($row['product_id']);
                                $all_c = json_decode($row['color']);
                                $all_op = json_decode($row['options'],true);
                            ?>

                            
                            <div id="more_additional_fields">
                            <?php
                                if(!empty($all_af)){
                                    foreach($all_af as $row1){
                            ?> 
                                <div class="form-group btm_border">
                                    <div class="col-sm-4">
                                        <input type="text" name="ad_field_names[]" value="<?php echo $row1['name']; ?>" placeholder="Field Name" class="form-control required" >
                                    </div>
                                    <div class="col-sm-5">
                                          <textarea rows="9"  class="summernotes" data-height="100" data-name="ad_field_values[]"><?php echo $row1['value']; ?></textarea>
                                    </div>
                                    <div class="col-sm-2">
                                        <span class="remove_it_v btn btn-primary" onclick="delete_row(this)">X</span>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                            ?> 
                            </div>
                            <!-- Test section -->
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label"><p>Taste Section</p></label>
                               <div class="col-sm-6">  
                                    <input type="checkbox" name="test_section" placeholder="<?php echo translate('test_section');?>" <?php if($row['test_section'] == 'yes') { echo "checked"; } ?>  value="yes">
                               </div>
                            </div>

                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-57"><?php echo translate('test_title');?></label>
                                <div class="col-sm-3">
                                    <input type="text" name="test_title" id="demo-hor-57" value="<?php echo $row['test_title']; ?>" placeholder="<?php echo translate('Taste Meter Rate');?>" min="1" max="100" class="form-control">
                                </div>
                            </div>

                            
                            <!-- test Percentage -->
                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-65"><?php echo translate('test1_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test1_name" id="demo-hor-65" value="<?php echo $row['test1_name']; ?>" class="form-control">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-66"><?php echo translate('test1_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test1_number" id="demo-hor-66" value="<?php echo $row['test1_number']; ?>" min="0" max="9" class="form-control taste-items1">
                                </div> 

                                <label class="col-sm-1 control-label" for="demo-hor-67"><?php echo translate('test11_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test11_name" id="demo-hor-67" value="<?php echo $row['test11_name']; ?>"  class="form-control">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-68"><?php echo translate('test11_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test11_number" id="demo-hor-68" value="<?php echo $row['test11_number']; ?>" min="0" max="9" class="form-control taste-items11">
                                </div>                           
                            </div>

                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-69"><?php echo translate('test2_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test2_name" id="demo-hor-69" value="<?php echo $row['test2_name']; ?>"  class="form-control">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-70"><?php echo translate('test2_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test2_number" id="demo-hor-70" value="<?php echo $row['test2_number']; ?>" min="0" max="9" class="form-control taste-items2">
                                </div> 

                                <label class="col-sm-1 control-label" for="demo-hor-71"><?php echo translate('test22_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test22_name" id="demo-hor-71" value="<?php echo $row['test22_name']; ?>"  class="form-control">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-72"><?php echo translate('test22_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test22_number" id="demo-hor-72" value="<?php echo $row['test2_number']; ?>" min="0" max="9" class="form-control taste-items22">
                                </div>                           
                            </div>

                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-73"><?php echo translate('test3_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test3_name" id="demo-hor-73" value="<?php echo $row['test3_name']; ?>"  class="form-control">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-74"><?php echo translate('test3_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test3_number" id="demo-hor-74" value="<?php echo $row['test3_number']; ?>" min="0" max="9" class="form-control taste-items3">
                                </div> 

                                <label class="col-sm-1 control-label" for="demo-hor-75"><?php echo translate('test33_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test33_name" id="demo-hor-75" value="<?php echo $row['test33_name']; ?>"  class="form-control">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-76"><?php echo translate('test33_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test33_number" id="demo-hor-76" value="<?php echo $row['test33_number']; ?>" min="0" max="9" class="form-control taste-items33">
                                </div>                           
                            </div> 
                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-73"><?php echo translate('test4_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test4_name" id="demo-hor-73"   class="form-control" value="<?php echo $row['test4_name']; ?>">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-74"><?php echo translate('test4_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test4_number" id="demo-hor-74"  min="0" max="9" class="form-control taste-items4" value="<?php echo $row['test4_number']; ?>">
                                </div> 

                                <label class="col-sm-1 control-label" for="demo-hor-75"><?php echo translate('test44_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test44_name" id="demo-hor-75"   class="form-control" value="<?php echo $row['test44_name']; ?>">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-76"><?php echo translate('test44_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test44_number" id="demo-hor-76"  min="0" max="9" class="form-control taste-items44" value="<?php echo $row['test44_number']; ?>">
                                </div>                           
                            </div>
                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-73"><?php echo translate('test5_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test5_name" id="demo-hor-73"   class="form-control" value="<?php echo $row['test5_name']; ?>">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-74"><?php echo translate('test5_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test5_number" id="demo-hor-74"  min="0" max="9" class="form-control taste-items5" value="<?php echo $row['test5_number']; ?>">
                                </div> 

                                <label class="col-sm-1 control-label" for="demo-hor-75"><?php echo translate('test55_name');?></label>
                                <div class="col-sm-1">
                                    <input type="text" name="test55_name" id="demo-hor-75"   class="form-control" value="<?php echo $row['test55_name']; ?>">
                                </div>

                                <label class="col-sm-1 control-label" for="demo-hor-76"><?php echo translate('test55_number');?></label>
                                <div class="col-sm-1">
                                    <input type="number" name="test55_number" id="demo-hor-76"  min="0" max="9" class="form-control taste-items55" value="<?php echo $row['test55_number']; ?>">
                                </div>                           
                            </div>
                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-55"><?php echo translate('test_sumary_title');?></label>
                                <div class="col-sm-3">
                                    <input type="text" name="test_sumary_title" id="demo-hor-55" value="<?php echo $row['test_sumary_title']; ?>" placeholder="<?php echo translate('test_sumary_title');?>" min="1" max="100" class="form-control">
                                </div>
                            </div>

                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-56"><?php echo translate('test_sumary');?></label>
                                <div class="col-sm-6">
                                     <textarea type="text" name="test_sumary" id="demo-hor-57" min="1" maxlength="250" class="form-control"><?php echo $row['test_sumary']; ?></textarea>
                                </div>
                            </div>


                            <!-- section over -->

                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_section');?></label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="food_section" placeholder="<?php echo translate('food_section');?>" <?php if($row['food_section'] == 'yes') { echo "checked"; } ?>  value="yes">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_title');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_title" placeholder="<?php echo translate('food_title');?>" class="form-control" value="<?php echo $row['food_title']; ?>" >
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_description');?></label>
                                <div class="col-sm-6">
                                    <textarea name="food_description" maxlength="250" rows="3" placeholder="<?php echo translate('food_description');?>" class="form-control"><?php echo $row['food_description']; ?></textarea>
                                </div>
                            </div>
                             <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 1</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name1" placeholder="<?php echo translate('food_name');?> 1" class="form-control" value="<?php echo $row['food_name1']; ?>">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-12"><?php echo translate('food_image');?> 1</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image1" onchange="foodpreview1(this);" id="demo-hor-12" class="form-control">
                                    <input type="hidden" class="forempty1" name="last_food_image1" value="<?php echo $row['food_image1']; ?>">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood1" ></span>
                                </div>
                            </div>
                            <?php if($row['food_image1']) { ?>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-13"></label>
                                <div class="col-sm-6">
                                    <div class="delete-div-wrap">
                                        <span class="delete-product-food close">&times;</span>
                                        <div class="inner-div">
                                            <img class="img-responsive" width="100" src="<?php echo base_url('uploads/product_image/'.$row['food_image1']); ?>" image-id="1"  data-id="<?php echo $row['product_id']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 2</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name2" placeholder="<?php echo translate('food_name');?> 2" class="form-control"  value="<?php echo $row['food_name2']; ?>">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-22"><?php echo translate('food_image');?> 2</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image2" onchange="foodpreview2(this);" id="demo-hor-12" class="form-control">
                                    <input type="hidden" class="forempty2" name="last_food_image2" value="<?php echo $row['food_image2']; ?>">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood2" ></span>
                                </div>
                            </div>
                            <?php if($row['food_image2']) { ?>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-2"></label>
                                <div class="col-sm-6">
                                    <div class="delete-div-wrap">
                                        <span class="delete-product-food close">&times;</span>
                                        <div class="inner-div">
                                            <img class="img-responsive" width="100" src="<?php echo base_url('uploads/product_image/'.$row['food_image2']); ?>" image-id="2" data-id="<?php echo $row['product_id']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 3</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name3" placeholder="<?php echo translate('food_name');?> 3" class="form-control"  value="<?php echo $row['food_name3']; ?>">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-33"><?php echo translate('food_image');?> 3</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image3" onchange="foodpreview3(this);" id="demo-hor-12" class="form-control">
                                    <input type="hidden" class="forempty3" name="last_food_image3" value="<?php echo $row['food_image3']; ?>">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood3" ></span>
                                </div>
                            </div>
                            <?php if($row['food_image3']) { ?>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-3"></label>
                                <div class="col-sm-6">
                                    <div class="delete-div-wrap">
                                        <span class="delete-product-food close">&times;</span>
                                        <div class="inner-div">
                                            <img class="img-responsive" width="100" src="<?php echo base_url('uploads/product_image/'.$row['food_image3']); ?>" image-id="3" data-id="<?php echo $row['product_id']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 4</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name4" placeholder="<?php echo translate('food_name');?> 4" class="form-control"  value="<?php echo $row['food_name4']; ?>">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-44"><?php echo translate('food_image');?> 4</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image4" onchange="foodpreview4(this);" id="demo-hor-12" class="form-control">
                                    <input type="hidden" class="forempty4" name="last_food_image4" value="<?php echo $row['food_image4']; ?>">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood4" ></span>
                                </div>
                            </div>
                               <?php if($row['food_image4']) { ?>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-4"></label>
                                <div class="col-sm-6">
                                    <div class="delete-div-wrap">
                                        <span class="delete-product-food close">&times;</span>
                                        <div class="inner-div">
                                            <img class="img-responsive" width="100" src="<?php echo base_url('uploads/product_image/'.$row['food_image4']); ?>" image-id="4" data-id="<?php echo $row['product_id']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-11">
                    	<span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" 
                            onclick="ajax_set_full('edit','<?php echo translate('edit_product'); ?>','<?php echo translate('successfully_edited!'); ?>','product_edit','<?php echo $row['product_id']; ?>') "><?php echo translate('reset');?>
                        </span>
                     </div>
                     <div class="col-md-1">
                     	<span class="btn btn-success btn-md btn-labeled fa fa-wrench pull-right enterer" onclick="form_submit('product_edit','<?php echo translate('successfully_edited!'); ?>');proceed('to_add');" ><?php echo translate('edit');?></span> 
                     </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    }
?>
<!--Bootstrap Tags Input [ OPTIONAL ]-->
<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<input type="hidden" id="option_count" value="<?php if($r == 1){ echo $row1['no']; } else { echo '0'; } ?>">
<?php 
if($row['food_section'] != 'yes')
{
    ?>
<style type="text/css">
    .hide_show_field
    {
        display: none;
    }
</style>
<?php
}
?>
<!-- Test Section -->
<?php 
if($row['test_section'] != 'yes')
{
    ?>
     <style type="text/css">
        .test_hide_show_field
        {
            display: none;
        }  
    </style>
<?php
}
?>

<script type="text/javascript">
    $("input[name = 'food_section']").click(function() {
        if($("input[name = 'food_section']").is(':checked'))
        {
            $('.hide_show_field').show();
        }
        else
        {
            $('.hide_show_field').hide();
        }
    });

    $("input[name = 'test_section']").click(function() {
        if($("input[name = 'test_section']").is(':checked'))
        {
            $('.test_hide_show_field').show();
        }
        else
        {
            $('.test_hide_show_field').hide();
        }
    });
    window.preview = function (input) {
        if (input.files && input.files[0]) {
            $("#previewImg").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
                }
            });
        }
    }
    window.foodpreview1 = function (input) {
        if (input.files && input.files[0]) 
        {
            $("#previewImgFood1").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImgFood1").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
                }
            });               
        }
    }
    window.foodpreview2 = function (input) {
        if (input.files && input.files[0]) 
        {
            $("#previewImgFood2").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImgFood2").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
                }
            });               
        }
    }
    window.foodpreview3 = function (input) {
        if (input.files && input.files[0]) 
        {
            $("#previewImgFood3").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImgFood3").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
                }
            });               
        }
    }
    window.foodpreview4 = function (input) {
        if (input.files && input.files[0]) 
        {
            $("#previewImgFood4").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImgFood4").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
                }
            });               
        }
    }
    $('.delete-product-img').on('click', function() 
    { 
        var pid = $(this).data('id'); 
        var productid = $(this).data('product-id'); 
        var here = $(this); 
        msg = 'Really want to delete this Image?'; 
        bootbox.confirm(msg, function(result) {
            if (result) { 
                 $.ajax({ 
                    url: base_url+''+user_type+'/'+module+'/dlt_img/'+pid+'/'+productid, 
                    cache: false, 
                    success: function(data) { 
                        $('input[name="last_products_images"]').attr('value',data);
                        $.activeitNoty({ 
                            type: 'success', 
                            icon : 'fa fa-check', 
                            message : 'Deleted Successfully', 
                            container : 'floating', 
                            timer : 3000 
                        }); 
                        here.closest('.delete-div-wrap').remove(); 
                    } 
                }); 
            }else{ 
                $.activeitNoty({ 
                    type: 'danger', 
                    icon : 'fa fa-minus', 
                    message : 'Cancelled', 
                    container : 'floating', 
                    timer : 3000 
                }); 
            }; 
          }); 
        }); 
        $('.delete-div-wrap .delete-product-food').on('click', function() { 
        var imageid = $(this).closest('.delete-div-wrap').find('img').attr('image-id'); 
        var productid = $(this).closest('.delete-div-wrap').find('img').data('id'); 
        var here = $(this); 
        msg = 'Really want to delete this Image?'; 
        bootbox.confirm(msg, function(result) {
            if (result) { 
                 $.ajax({ 
                    type: "POST",
                    data: { 'productid' : productid ,'imageid' : imageid },
                    url: base_url+''+user_type+'/'+module+'/delete_food/', 
                    cache: false, 
                    success: function(data) { 
                        $.activeitNoty({ 
                            type: 'success', 
                            icon : 'fa fa-check', 
                            message : 'Deleted Successfully', 
                            container : 'floating', 
                            timer : 3000 
                        }); 
                        here.closest('.delete-div-wrap').remove(); 
                        $('.forempty'+imageid).val('');
                    } 
                }); 
            }else{ 
                $.activeitNoty({ 
                    type: 'danger', 
                    icon : 'fa fa-minus', 
                    message : 'Cancelled', 
                    container : 'floating', 
                    timer : 3000 
                }); 
            }; 
          }); 
        });

    function other_forms(){}
	
	function set_summer(){
        $('.summernotes').each(function() {
            var now = $(this);
            var h = now.data('height');
            var n = now.data('name');
			if(now.closest('div').find('.val').length == 0){
            	now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
			}
            now.summernote({
                height: h,
                onChange: function() {
                    now.closest('div').find('.val').val(now.code());
                }
            });
			now.closest('div').find('.val').val(now.code());
        });
	}

    function option_count(type){
        var count = $('#option_count').val();
        if(type == 'add'){
            count++;
        }
        if(type == 'reduce'){
            count--;
        }
        $('#option_count').val(count);
    }

    function set_select(){
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
    }
    
    $(document).ready(function() {
        set_select();
        set_summer();
        createColorpickers();
    });

    function other(){
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
        $('#sub').show('slow');
    }
    function get_cat(id){
		$('#brn').hide('slow');
        $('#sub').hide('slow');
        ajax_load(base_url+'vendor/product/sub_by_cat/'+id,'sub_cat','other');
    }
	function get_brnd(id){
        $('#brn').hide('slow');
        ajax_load(base_url+'vendor/product/brand_by_sub/'+id,'brand','other');
        $('#brn').show('slow');
    }

    function get_sub_res(id){}

    $(".unit").on('keyup',function(){
        $(".unit_set").html($(".unit").val());
    });
	
	function createColorpickers() {
	
		$('.demo2').colorpicker({
			format: 'rgba'
		});
		
	}
	
    
    $("#more_btn").click(function(){
        $("#more_additional_fields").append(''
            +'<div class="form-group">'
            +'    <div class="col-sm-4">'
            +'        <input type="text" name="ad_field_names[]" class="form-control"  placeholder="<?php echo translate('field_name'); ?>">'
            +'    </div>'
            +'    <div class="col-sm-5">'
            +'        <textarea rows="9"  class="summernotes" data-height="100" data-name="ad_field_values[]"></textarea>'
            +'    </div>'
            +'    <div class="col-sm-2">'
            +'        <span class="remove_it_v rms btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
            +'    </div>'
            +'</div>'
        );
        set_summer();
    });
    
    
    $("#more_option_btn").click(function(){
        option_count('add');
        var co = $('#option_count').val();
        $("#more_additional_options").append(''
            +'<div class="form-group" data-no="'+co+'">'
            +'    <div class="col-sm-4">'
            +'        <input type="text" name="op_title[]" class="form-control required"  placeholder="<?php echo translate('customer_input_title'); ?>">'
            +'    </div>'
            +'    <div class="col-sm-5">'
            +'        <select class="demo-chosen-select op_type required" name="op_type[]" >'
            +'            <option value="">(none)</option>'
            +'            <option value="text">Text Input</option>'
            +'            <option value="single_select">Dropdown Single Select</option>'
            +'            <option value="multi_select">Dropdown Multi Select</option>'
            +'            <option value="radio">Radio</option>'
            +'        </select>'
            +'        <div class="col-sm-12 options">'
            +'          <input type="hidden" name="op_set'+co+'[]" value="none" >'
            +'        </div>'
            +'    </div>'
            +'    <input type="hidden" name="op_no[]" value="'+co+'" >'
            +'    <div class="col-sm-2">'
            +'        <span class="remove_it_o rmo btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
            +'    </div>'
            +'</div>'
        );
        set_select();
    });
    
    $("#more_additional_options").on('change','.op_type',function(){
        var co = $(this).closest('.form-group').data('no');
        if($(this).val() !== 'text' && $(this).val() !== ''){
            $(this).closest('div').find(".options").html(''
                +'    <div class="col-sm-12">'
                +'        <div class="col-sm-12 options margin-bottom-10"></div><br>'
                +'        <div class="btn btn-mint btn-labeled fa fa-plus pull-right add_op">'
                +'        <?php echo translate('add_options_for_choice');?></div>'
                +'    </div>'
            );
        } else if ($(this).val() == 'text' || $(this).val() == ''){
            $(this).closest('div').find(".options").html(''
                +'    <input type="hidden" name="op_set'+co+'[]" value="none" >'
            );
        }
    });
    
    $("#more_additional_options").on('click','.add_op',function(){
        var co = $(this).closest('.form-group').data('no');
        $(this).closest('.col-sm-12').find(".options").append(''
            +'    <div>'
            +'        <div class="col-sm-10">'
            +'          <input type="text" name="op_set'+co+'[]" class="form-control required"  placeholder="<?php echo translate('option_name'); ?>">'
            +'        </div>'
            +'        <div class="col-sm-2">'
            +'          <span class="remove_it_n rmon btn btn-danger btn-icon btn-circle icon-sm fa fa-times" onclick="delete_row(this)"></span>'
            +'        </div>'
            +'    </div>'
        );
    });
    
    $('body').on('click', '.rmo', function(){
        $(this).parent().parent().remove();
    });

    function next_tab(){
        $('.nav-tabs li.active').next().find('a').click();                    
    }
    function previous_tab(){
        $('.nav-tabs li.active').prev().find('a').click();                     
    }
    
    $('body').on('click', '.rmon', function(){
        var co = $(this).closest('.form-group').data('no');
        $(this).parent().parent().remove();
        if($(this).parent().parent().parent().html() == ''){
            $(this).parent().parent().parent().html(''
                +'   <input type="hidden" name="op_set'+co+'[]" value="none" >'
            );
        }
    });

    
    $('body').on('click', '.rms', function(){
        $(this).parent().parent().remove();
    });


    $("#more_color_btn").click(function(){
        $("#more_colors").append(''
            +'      <div class="col-md-12" style="margin-bottom:8px;">'
            +'          <div class="col-md-8">'
            +'              <div class="input-group demo2">'
            +'                 <input type="text" value="#ccc" name="color[]" class="form-control" />'
            +'                 <span class="input-group-addon"><i></i></span>'
            +'              </div>'
            +'          </div>'
            +'          <span class="col-md-4">'
            +'              <span class="remove_it_v rmc btn btn-danger btn-icon btn-circle icon-lg fa fa-times" ></span>'
            +'          </span>'
            +'      </div>'
        );
        createColorpickers();
    });                

    $('body').on('click', '.rmc', function(){
        $(this).parent().parent().remove();
    });

	
    function delete_row(e)
    {
        e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
    }    
	
	
	$(document).ready(function() {
		$("form").submit(function(e){
			event.preventDefault();
		});
	});


    document.getElementsByClassName('taste-items1')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items11')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items2')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items22')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items3')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items33')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items4')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items44')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items5')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
    document.getElementsByClassName('taste-items55')[0].oninput = function () {
        var max = parseInt(this.max);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
    }
</script>
<style>
	.btm_border{
		border-bottom: 1px solid #ebebeb;
		padding-bottom: 15px;	
	}
</style>

