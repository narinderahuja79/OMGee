<form>
    <div class="col-sm-12 form-horizontal" style="margin-top:9px !important;">
        <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,2" data-show-toggle="true" data-show-columns="false" data-search="true" >

            <thead>
                <tr>
                    <th><?php echo translate('no');?></th>
                    <th><?php echo translate('name');?></th>
                    <th><?php echo translate('icon');?></th>
                    <th><?php echo translate('option');?></th>
                </tr>
            </thead>
                
            <tbody >
            <?php  
            // echo "<pre>";
            //  print_r($products);
                $i = 0;
                foreach($products as $row){ 
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td>
                    <img class="img-md"
                        src="<?php echo $this->crud_model->file_view('video',$row['video_id'],'100','','no','src','','','.jpg') ?>"  />
                </td>
                <td class="text-left">
                    <!-- <a data-id="<?php echo $row['video_id']; ?>" class="btn btn-info btn-xs btn-labeled fa fa-location-arrow" data-toggle="tooltip" onclick="ajax_set_full('view','View Product','Successfully Viewed!','product_view','30');proceed('to_list');" data-original-title="View" data-container="body">View
                    </a> -->
                    <a data-id="<?php echo $row['video_id']; ?>" class="btn btn-info btn-xs btn-labeled fa fa-location-arrow" data-toggle="tooltip" onclick="ajax_set_full('details','show details','Successfully Viewed!','show_details','<?php echo $row['video_id']; ?>');proceed('to_list');" data-original-title="View" data-container="body">View
                    </a>

                    <!-- <a data-id="<?php echo $row['video_id']; ?>" class="btn btn-info btn-xs btn-labeled fa fa-location-arrow" data-toggle="tooltip" href="<?php echo site_url('admin/video_insert/details') ?>">View
                    </a> -->


                </td>
            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>

        <div class="form-group" style="display:none;">
            <label class="col-sm-4 control-label" for="demo-hor-inputemail">
                <?php echo translate('select_language'); ?>
            </label>
            <div class="col-sm-6">
                <select name="language" class="demo-cs-multiselect" onchange="ajax_set_list(this.value);">
                <?php
                    $set_lang = $this->db->get_where('general_settings',array('type'=>'language'))->row()->value;
                    $fields = $this->db->list_fields('language');
                    foreach ($fields as $field)
                    {
                        if($field !== 'word' && $field !== 'word_id'){
                ?>
                    <option value="<?php echo $field; ?>" 
                        <?php if($set_lang == $field){ echo 'selected'; } ?> >
                            <?php echo ucfirst($field); ?>
                    </option>
                <?php
                        }
                    }
                ?>
                </select>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">

    function set_switchery(){
        $(".aiz_switchery").each(function(){
            new Switchery($(this).get(0), {color:'rgb(100, 189, 99)', secondaryColor: '#cc2424', jackSecondaryColor: '#c8ff77'});

            var changeCheckbox = $(this).get(0);
            var false_msg = $(this).data('fm');
            var true_msg = $(this).data('tm');
            changeCheckbox.onchange = function() {
                $.ajax({url: base_url+'admin/language_settings/'+$(this).data('set')+'/'+$(this).data('id')+'/'+changeCheckbox.checked, 
                success: function(result){  
                  if(changeCheckbox.checked == true){
                    $.activeitNoty({
                        type: 'success',
                        icon : 'fa fa-check',
                        message : true_msg,
                        container : 'floating',
                        timer : 3000
                    });
                    sound('published');
                  } else {
                    $.activeitNoty({
                        type: 'danger',
                        icon : 'fa fa-check',
                        message : false_msg,
                        container : 'floating',
                        timer : 3000
                    });
                    sound('unpublished');
                  }
                }});
            };
        });
    }

    $(document).ready(function() {
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
    });
</script>

