<div class="row">
    <div class="col-md-12">
		<?php
            echo form_open(base_url() . 'vendor/product/do_add/', array(
                'class' => 'form-horizontal',
                'method' => 'post',
                'id' => 'product_add',
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
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-base">
                    <!--Tabs Content-->                    
                    <div class="tab-content">
                    	<!-- <div  id="product_details" class="tab-pane fade active in"> -->
                            <div class="form-group btm_border">
                                <h4 class="text-thin text-center"><?php echo translate('product_details'); ?></h4>                            
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-12">Product <?php echo translate('images');?></label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" multiple name="images[]" onchange="preview(this);" id="demo-hor-12" class="form-control required">
                                    </span>
                                    <br><br>
                                    <span id="previewImg" ></span>
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo translate('category');?></label>
                                <div class="col-sm-6">
                                    <?php echo $this->crud_model->select_html('category','category','category_name','add','demo-chosen-select required','','digital',NULL,'get_cat'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group btm_border" >
                                <label class="col-sm-4 control-label" for="demo-hor-3"><?php echo translate('sub-category');?></label>
                                <div class="col-sm-6" id="sub_cat">
                                    <?php echo $this->crud_model->select_html('sub_category','sub_category','sub_category_name','add','demo-chosen-select ','','digital',NULL,'get_cat'); ?>
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-84"><?php echo translate('variety');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="variety" id="demo-hor-84" placeholder="<?php echo translate('variety');?>" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-3 control-label" for="demo-hor-1"><?php echo "Product Name"; ?></label>
                                <div class="col-sm-3">
                                    <input type="text" name="title_en" id="demo-hor-1" placeholder="<?php echo "Product Name"; ?>" class="form-control required">English
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="title_ch" id="demo-hor-1" placeholder="<?php echo "Product Name"; ?>" class="form-control required">Chinese
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="title_jp" id="demo-hor-1" placeholder="<?php echo "Product Name"; ?>" class="form-control required">Japanese
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-83"><?php echo translate('product_year');?></label>
                                <div class="col-sm-6">
                                    <input type="number" name="product_year" id="demo-hor-83" min="0" placeholder="<?php echo translate('_e.g._2016,_2017,_etc.'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-83"><?php echo translate('regions');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="regions" id="demo-hor-83" min="0"  placeholder="<?php echo translate('_e.g._Barrosa valley,_Hunter valley,_etc.'); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-5">Volume (ml) </label>
                                <div class="col-sm-6">
                                    <input type="text" name="unit" id="demo-hor-5" placeholder="<?php echo translate('unit_(e.g._kg,_pc_etc.)'); ?>" class="form-control unit required">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-82"><?php echo translate('product_abv (%)');?></label>
                                <div class="col-sm-6">
                                    <input type="number"   name="product_abv"  oninput="if(this.value.length==2) return false;" id="demo-hor-82" min="1" max="30" placeholder="<?php echo translate('_e.g._23%_per_bottle/can,_etc.'); ?>" class="form-control required product_abv">
                                </div>
                                <span id="product_abv_error"></span>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-11"><?php echo translate('tags');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="tag" data-role="tagsinput" placeholder="<?php echo translate('tags');?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-81"><?php echo translate('limited_release');?></label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="limited_release">
                                        <option value="">Select..</option>
                                        <option value="Yes"><?php echo translate('yes');?></option>
                                         <option value="No"><?php echo translate('no');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-13">Product Description English</label>
                                <div class="col-sm-6">
                                    <textarea rows="9"  class="summernotes" data-height="200" data-name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-13">Product Description Chinese</label>
                                <div class="col-sm-6">
                                    <textarea rows="9"  class="summernotes" data-height="200" data-name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-13">Product Description Japanese</label>
                                <div class="col-sm-6">
                                    <textarea rows="9"  class="summernotes" data-height="200" data-name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group btm_border" >
                                <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('wholesale');?></label>
                                <div class="col-sm-6" >
                                    <input type="number" min="1" name="wholesale" class="form-control ">
                                </div>                                
                            </div>
                            <div class="form-group btm_border" >
                                <label class="col-sm-4 control-label" for="demo-hor-5">Wholesale (EXCL WET & GST)</label>
                                <div class="col-sm-6" >
                                    <input type="number" min="1" name="Wholesale_EXCL_WET_GST" class="form-control ">
                                </div>                                
                            </div>
                            <div class="form-group btm_border" >
                                <label class="col-sm-4 control-label" for="demo-hor-4"><?php echo translate('brand');?></label>
                                <div class="col-sm-6" >
                                    <?php echo $this->crud_model->select_html('vendorbrands','brand','name','add','demo-chosen-select ','',NULL); ?>  
                                </div>
                            </div> 
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-84"><?php echo translate('is_low_stock');?></label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="is_low_stock" id="demo-hor-84" <?php if($row['is_low_stock']=='yes') { echo 'checked'; } ?> value="yes" placeholder="<?php echo translate('is_low_stock');?>"> Low Stock
                                </div>
                            </div>
                            <div class="form-group btm_border" >
                                <label class="col-sm-1 control-label" for="demo-hor-5">AU <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_AU" class="form-control required">
                                </div>  <label class="col-sm-1 control-label" for="demo-hor-5">HK <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_HK" class="form-control">
                                </div>  <label class="col-sm-1 control-label" for="demo-hor-5">JP <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_JP" class="form-control">
                                </div>
                                <label class="col-sm-1 control-label" for="demo-hor-5">SG <?php echo translate('bundle_sale_price');?></label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" name="sale_price_SG" class="form-control">
                                </div>                              
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('bundle_discount');?> (%)</label>
                                <div class="col-sm-6">
                                    <input type="number" min="1" value="0" name="discount" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label"><p><?php echo translate('test_section');?></p></label>
                                <div class="col-sm-6">  
                                    <input  name="test_section" type="checkbox" value="yes" >
                               </div>
                            </div>

                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-3 control-label" for="demo-hor-55"><?php echo translate('test_title');?></label>
                                <div class="col-sm-3">
                                    <input type="text" name="test_title_en" id="demo-hor-55" placeholder="<?php echo translate('Taste Meter Rate');?>" min="1" max="100" class="form-control">English
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="test_title_ch" id="demo-hor-55" placeholder="<?php echo translate('Taste Meter Rate');?>" min="1" max="100" class="form-control">Chinese
                                </div>                            
                                <div class="col-sm-3">
                                    <input type="text" name="test_title_jp" id="demo-hor-55" placeholder="<?php echo translate('Taste Meter Rate');?>" min="1" max="100" class="form-control">Japanese
                                </div>
                            </div>                           
                            <!-- test Percentage -->
                            <div class="form-group btm_border test_hide_show_field">
                                <div class="col-sm-3">
                                    <select name="test1_name" id="demo-hor-65"  class="form-control">
                                        <option value="">Select <?php echo translate('test1_name');?></option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test1_number">
                                            <option value="">Select <?php echo translate('test1_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div> 
                                <div class="col-sm-3">
                                   <select name="test11_name" id="demo-hor-67"   class="form-control">
                                        <option value="">Select <?php echo translate('test11_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test11_number">
                                            <option value="">Select <?php echo translate('test11_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div>                           
                            </div>
                            <div class="form-group btm_border test_hide_show_field">
                                <div class="col-sm-3">
                                    <select name="test2_name" id="demo-hor-69"   class="form-control">
                                        <option value="">Select <?php echo translate('test2_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test2_number">
                                            <option value="">Select <?php echo translate('test2_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="test22_name" id="demo-hor-71"   class="form-control">
                                        <option value="">Select <?php echo translate('test22_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test22_number">
                                            <option value="">Select <?php echo translate('test22_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div>                           
                            </div>

                            <div class="form-group btm_border test_hide_show_field">
                                <div class="col-sm-3">
                                    <select name="test3_name" id="demo-hor-73"   class="form-control">
                                        <option value="">Select <?php echo translate('test3_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test3_number">
                                            <option value="">Select <?php echo translate('test3_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div>     
                                <div class="col-sm-3">
                                    <select name="test33_name" id="demo-hor-75"   class="form-control">
                                        <option value="">Select <?php echo translate('test33_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test33_number">
                                            <option value="">Select <?php echo translate('test33_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div>                          
                            </div>
                            <div class="form-group btm_border test_hide_show_field">
                                <div class="col-sm-3">
                                    <select name="test4_name" id="demo-hor-73"   class="form-control">
                                        <option value="">Select <?php echo translate('test4_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test4_number">
                                            <option value="">Select <?php echo translate('test4_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div> 
                                <div class="col-sm-3">
                                    <select name="test44_name" id="demo-hor-73"   class="form-control">
                                        <option value="">Select <?php echo translate('test44_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test44_number">
                                            <option value="">Select <?php echo translate('test44_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div>                           
                            </div>
                            <div class="form-group btm_border test_hide_show_field">
                                <div class="col-sm-3">
                                    <select name="test5_name" id="demo-hor-73"   class="form-control">
                                        <option value="">Select <?php echo translate('test5_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test5_number">
                                            <option value="">Select <?php echo translate('test5_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div> 
                                <div class="col-sm-3">
                                    <select name="test55_name" id="demo-hor-73"   class="form-control">
                                        <option value="">Select <?php echo translate('test55_name');?>..</option>
                                        <option value="Sparkling">Sparkling</option>
                                        <option value="Dry white">Dry White</option>
                                        <option value="Sweet white">Sweet White</option>
                                        <option value="Rich White">Rich White</option>
                                        <option value="Rose">Rose</option>
                                        <option value="Light Red">Light Red</option>
                                        <option value="Medium Red">Medium Red</option>
                                        <option value="Bold Red">Bold Red</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fortified">Fortified</option>
                                        <option value="Non-Alcohol">Non-Alcohol</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="test55_number">
                                            <option value="">Select <?php echo translate('test55_number');?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                    </select>
                                </div>                          
                            </div>
                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-2 control-label" for="demo-hor-56"><?php echo translate('test_sumary_title');?></label>
                                <div class="col-sm-3">
                                    <input type="text" name="test_sumary_title_en" id="demo-hor-56" placeholder="<?php echo translate('test_sumary_title');?>" min="1" max="100" class="form-control">English
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="test_sumary_title_ch" id="demo-hor-56" placeholder="<?php echo translate('test_sumary_title');?>" min="1" max="100" class="form-control">Chinese
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="test_sumary_title_jp" id="demo-hor-56" placeholder="<?php echo translate('test_sumary_title');?>" min="1" max="100" class="form-control">Japanese
                                </div>
                            </div>

                            <div class="form-group btm_border test_hide_show_field">
                                <label class="col-sm-2 control-label" for="demo-hor-57"><?php echo translate('test_sumary');?></label>
                                <div class="col-sm-3">
                                    <textarea type="text" name="test_sumary_en" id="demo-hor-57" placeholder="<?php echo translate('test_sumary');?>" min="1" maxlength="250" class="form-control"></textarea>English
                                </div>
                                <div class="col-sm-3">
                                    <textarea type="text" name="test_sumary_ch" id="demo-hor-57" placeholder="<?php echo translate('test_sumary');?>" min="1" maxlength="250" class="form-control"></textarea>Chinese
                                </div>
                                <div class="col-sm-3">
                                    <textarea type="text" name="test_sumary_jp" id="demo-hor-57" placeholder="<?php echo translate('test_sumary');?>" min="1" maxlength="250" class="form-control"></textarea>Japanese
                                </div>
                                
                            </div>
                            <!-- Test section over -->

                           <!-- Food Section  -->
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_section');?></label>
                                <div class="col-sm-6">
                                    <input type="checkbox" name="food_section" placeholder="<?php echo translate('food_section');?>" value="yes">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_title');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_title" value="Food That Goes Well With This" placeholder="<?php echo translate('food_title');?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_description');?></label>
                                <div class="col-sm-6">
                                    <textarea name="food_description" maxlength="250" rows="3" placeholder="<?php echo translate('food_description');?>" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 1</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name1" placeholder="<?php echo translate('food_name');?> 1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-12"><?php echo translate('food_image');?> 1</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image1" onchange="foodpreview1(this);" id="demo-hor-12" class="form-control">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood1" ></span>
                                </div>
                            </div> 
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 2</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name2" placeholder="<?php echo translate('food_name');?> 2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-22"><?php echo translate('food_image');?> 2</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image2" onchange="foodpreview2(this);" id="demo-hor-12" class="form-control">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood2" ></span>
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 3</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name3" placeholder="<?php echo translate('food_name');?> 3" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-33"><?php echo translate('food_image');?> 3</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image3" onchange="foodpreview3(this);" id="demo-hor-12" class="form-control">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood3" ></span>
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" ><?php echo translate('food_name');?> 4</label>
                                <div class="col-sm-6">
                                    <input type="text" name="food_name4" placeholder="<?php echo translate('food_name');?> 4" class="form-control">
                                </div>
                            </div>
                            <div class="form-group btm_border hide_show_field">
                                <label class="col-sm-4 control-label" for="demo-hor-44"><?php echo translate('food_image');?> 4</label>
                                <div class="col-sm-6">
                                <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                                    <input type="file" name="food_image4" onchange="foodpreview4(this);" id="demo-hor-12" class="form-control">
                                    </span>
                                    <br><br>
                                    <span id="previewImgFood4" ></span>
                                </div>
                            </div>
                       <!--  </div> -->
                        
                        <!-- Food section Over -->

                        <div style="display: none;" id="business_details" class="tab-pane fade">
                            <div class="form-group btm_border">
                                <h4 class="text-thin text-center"><?php echo translate('business_details'); ?></h4>                            
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-6"><?php echo translate('sale_price');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="sale_price" id="demo-hor-6" min='0' step='.01' placeholder="<?php echo translate('sale_price');?>" class="form-control ">
                                </div>
                                <span class="btn"><?php echo currency('','def'); ?> / </span>
                                <span class="btn unit_set"></span>
                            </div>
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-7"><?php echo translate('purchase_price');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="purchase_price" id="demo-hor-7" min='0' step='.01' placeholder="<?php echo translate('purchase_price');?>" class="form-control ">
                                </div>
                                <span class="btn"><?php echo currency('','def'); ?> / </span>
                                <span class="btn unit_set"></span>
                            </div>
                            
                            <!-- <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-8"><?php echo translate('shipping_cost');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="shipping_cost" id="demo-hor-8" min='0' step='.01' placeholder="<?php echo translate('shipping_cost');?>" class="form-control">
                                </div>
                                <span class="btn"><?php echo currency('','def'); ?> / </span>
                                <span class="btn unit_set"></span>
                            </div>
                            
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-9"><?php echo translate('product_tax');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="tax" id="demo-hor-9" min='0' step='.01' placeholder="<?php echo translate('product_tax');?>" class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <select class="demo-chosen-select" name="tax_type">
                                        <option value="percent">%</option>
                                        <option value="amount"><?php echo currency('','def'); ?></option>
                                    </select>
                                </div>
                                <span class="btn unit_set"></span>
                            </div> -->
                            
                            <!-- <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-10"><?php echo translate('product_discount');?></label>
                                <div class="col-sm-4">
                                    <input type="number" name="discount" id="demo-hor-10" min='0' step='.01' placeholder="<?php echo translate('product_discount');?>" class="form-control">
                                </div>
                                <div class="col-sm-1">
                                    <select class="demo-chosen-select" name="discount_type">
                                        <option value="percent">%</option>
                                         <option value="amount"><?php echo currency('','def'); ?></option> 
                                    </select>
                                </div>
                                <span class="btn unit_set"></span>
                            </div>
                        </div>--->
                        <div id="customer_choice_options" class="tab-pane fade">
                            <div class="form-group btm_border">
                                <h4 class="text-thin text-center"><?php echo translate('customer_choice_options'); ?></h4>                            
                            </div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-14"><?php echo translate('color'); ?></label>
                                <div class="col-sm-4"  id="more_colors">
                                  <div class="col-md-12" style="margin-bottom:8px;">
                                      <div class="col-md-10">
                                          <div class="input-group demo2">
                                               <input type="text" value="#ccc" name="color[]" class="form-control" />
                                               <span class="input-group-addon"><i></i></span>
                                            </div>
                                      </div>
                                      <span class="col-md-2">
                                          <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>
                                      </span>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                    <div id="more_color_btn" class="btn btn-primary btn-labeled fa fa-plus">
                                        <?php echo translate('add_more_colors');?>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="more_additional_options"></div>
                            <div class="form-group btm_border">
                                <label class="col-sm-4 control-label" for="demo-hor-inputpass"></label>
                                <div class="col-sm-6">
                                    <h4 class="pull-left">
                                        <i><?php echo translate('if_you_need_more_choice_options_for_customers_of_this_product_,please_click_here.');?></i>
                                    </h4>
                                    <div id="more_option_btn" class="btn btn-mint btn-labeled fa fa-plus pull-right">
                                    <?php echo translate('add_customer_input_options');?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <span class="btn btn-purple btn-labeled fa fa-hand-o-right pull-right" onclick="next_tab()"><?php echo translate('next'); ?></span>
                <span class="btn btn-purple btn-labeled fa fa-hand-o-left pull-right" onclick="previous_tab()"><?php echo translate('previous'); ?></span> -->
        
            </div>
    
            <div class="panel-footer">
                <div class="row">
                	<div class="col-md-11">
                        <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" 
                            onclick="ajax_set_full('add','<?php echo translate('add_product'); ?>','<?php echo translate('successfully_added!'); ?>','product_add',''); "><?php echo translate('reset');?>
                        </span>
                    </div>
                    
                    <div class="col-md-1">
                        <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer" onclick="form_submit('product_add','<?php echo translate('product_has_been_uploaded!'); ?>');proceed('to_add');" ><?php echo translate('upload');?></span>
                    </div>
                    
                </div>
            </div>
    
        </form>
    </div>
</div>

<script src="<?php $this->benchmark->mark_time(); echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>

<input type="hidden" id="option_count" value="-1">

<style type="text/css">
    .hide_show_field
    {
        display: none;
    }
    .test_hide_show_field
    {
        display: none;
    }
</style>
<script>
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
        set_select();
        $('#sub').show('slow');
    }
    function get_cat(id,now){
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
            +'        <input type="text" name="ad_field_names[]" class="form-control required"  placeholder="<?php echo translate('field_name'); ?>">'
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
    
    function next_tab(){
        $('.nav-tabs li.active').next().find('a').click();                    
    }
    function previous_tab(){
        $('.nav-tabs li.active').prev().find('a').click();                     
    }
    
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
            +'          <div class="col-md-10">'
            +'              <div class="input-group demo2">'
			+'		     	   <input type="text" value="#ccc" name="color[]" class="form-control" />'
			+'		     	   <span class="input-group-addon"><i></i></span>'
			+'		        </div>'
            +'          </div>'
            +'          <span class="col-md-2">'
            +'              <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>'
            +'          </span>'
            +'      </div>'
  		);
		createColorpickers();
    });		           

    $('body').on('click', '.rmc', function(){
        $(this).parent().parent().remove();
    });


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
    /*$(".product_abv").on('keypress',function(e) 
    {
        if($(this).val() > 30) 
        {
            alert($(this).val());
           $('.product_abv_error').html('More than 30% ABV is not permissible.');
        }
    });*/
</script>

<style>
	.btm_border{
		border-bottom: 1px solid #ebebeb;
		padding-bottom: 15px;	
	}
</style>