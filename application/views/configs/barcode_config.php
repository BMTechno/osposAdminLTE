<center>
<div id="page_title"><?php echo $this->lang->line('config_barcode_configuration'); ?></div>
</center>
<?php echo form_open('config/save_barcode/',array('id'=>'barcode_config_form', 'class' => 'form-horizontal')); ?>
    <div id="config_wrapper">
        <fieldset id="config_info">
            <div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
            <ul id="barcode_error_message_box" class="error_message_box"></ul>
			<legend><?php echo $this->lang->line("config_barcode_info"); ?></legend>
            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_type'), 'barcode_type',array('class'=>'control-label col-xs-2')); ?>
                <div class='col-xs-2'>
                <?php echo form_dropdown('barcode_type', $support_barcode, $this->config->item('barcode_type'), "class='form-control'");?>
                </div>
            </div>
            
            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_quality'), 'barcode_quality',array('class'=>'control-label col-xs-2 required')); ?>
                <div class='col-xs-2'>
                <?php echo form_input(array(
                    'max'=>'100',
                    'min'=>'10',
                    'type'=>'number',
                    'name'=>'barcode_quality',
                    'id'=>'barcode_quality',
                    'class'=>'form-control',
                    'value'=>$this->config->item('barcode_quality')));?>
                </div>
            </div>
            
            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_width'), 'barcode_width',array('class'=>'control-label col-xs-2 required')); ?>
                <div class='col-xs-2'>
                <?php echo form_input(array(
                    'step'=>'5',
                    'max'=>'350',
                    'min'=>'60',
                    'type'=>'number',
                    'name'=>'barcode_width',
                    'id'=>'barcode_width',
                    'class'=>'form-control',
                    'value'=>$this->config->item('barcode_width')));?>
                </div>
            </div>

            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_height'), 'barcode_height',array('class'=>'control-label col-xs-2 required')); ?>
                <div class='col-xs-2'>
                <?php echo form_input(array(
                    'type' => 'number',
                    'min' => 10,
                    'max' => 120,
                    'name'=>'barcode_height',
                    'id'=>'barcode_height',
                    'class'=>'form-control',
                    'value'=>$this->config->item('barcode_height')));?>
                </div>
            </div>
            
            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_font'), 'barcode_font',array('class'=>'control-label col-xs-2 required')); ?>
                <div class='col-sm-2'>
                <?php echo form_dropdown('barcode_font', 
                   $this->barcode_lib->listfonts("fonts"),
                    $this->config->item('barcode_font'), "class='form-control'");
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php echo form_input(array(
                        'type' => 'number',
                        'min' => '1',
                        'max' => '30',
                        'name'=>'barcode_font_size',
                        'id'=>'barcode_font_size',
                        'class'=>'form-control',
                        'value'=>$this->config->item('barcode_font_size')));?>
                </div>
            </div>
            
			<div class="form-group">
			<?php echo form_label($this->lang->line('config_barcode_content'), 'barcode_content',array('class'=>'control-label col-xs-2')); ?>
				<div class='col-xs-6'>
                    <label class="radio-inline">
                        <?php echo form_radio(array(
                            'name'=>'barcode_content',
                            'value'=>'id',
                            'checked'=>$this->config->item('barcode_content') === "id")); ?>
                        <?php echo $this->lang->line('config_barcode_id'); ?>
                    </label>
					<label class="radio-inline">
                        <?php echo form_radio(array(
                            'name'=>'barcode_content',
                            'value'=>'number',
                            'checked'=>$this->config->item('barcode_content') === "number")); ?>
                        <?php echo $this->lang->line('config_barcode_number'); ?>
                    </label>
					<label class="checkbox-inline">
                        <?php echo form_checkbox(array(
                            'name'=>'barcode_generate_if_empty',
                            'value'=>'barcode_generate_if_empty',
                            'checked'=>$this->config->item('barcode_generate_if_empty'))); ?>
                        <?php echo $this->lang->line('config_barcode_generate_if_empty'); ?>
                    </label>
				</div>
			</div>

            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_layout'), 'barcode_layout',array('class'=>'control-label col-xs-2')); ?>
                <div class="col-sm-10">
                    <div class="form-group row">
                        <label class="control-label col-sm-2"><?php echo $this->lang->line('config_barcode_first_row').' '; ?></label>
                        <div class='col-sm-2'>
                            <?php echo form_dropdown('barcode_first_row', array(
                                'not_show'        => 'Not show',
                                'name'        => 'Name',
                                'category'   => 'Category',
                                'cost_price'           => 'Cost price',
                                'unit_price'           => 'Unit price',
                                'company_name'         => 'Company Name'
                            ),
                            $this->config->item('barcode_first_row'), "class='form-control'");
                            ?>
                        </div>
                        <label class="control-label col-sm-2"><?php echo $this->lang->line('config_barcode_second_row').' '; ?></label>
                        <div class='col-sm-2'>
                            <?php echo form_dropdown('barcode_second_row', array(
                                'not_show'        => 'Not show',
                                'name'        => 'Name',
                                'category'   => 'Category',
                                'cost_price'           => 'Cost price',
                                'unit_price'           => 'Unit price',
                                'item_code'            => 'Item code',
                                'company_name'         => 'Company Name'
                            ),
                            $this->config->item('barcode_second_row'), "class='form-control'");
                            ?>
                        </div>
                        <label class="control-label col-sm-2"><?php echo $this->lang->line('config_barcode_third_row').' '; ?></label>
                        <div class='col-sm-2'>
                            <?php echo form_dropdown('barcode_third_row', array(
                                'not_show'        => 'Not show',
                                'name'        => 'Name',
                                'category'   => 'Category',
                                'cost_price'           => 'Cost price',
                                'unit_price'           => 'Unit price',
                                'item_code'            => 'Item code',
                                'company_name'         => 'Company Name'
                            ),
                            $this->config->item('barcode_third_row'), "class='form-control'");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_number_in_row'), 'barcode_num_in_row',array('class'=>'control-label col-xs-2 required')); ?>
                <div class='col-xs-2'>
                <?php echo form_input(array(
                    'name'=>'barcode_num_in_row',
                    'id'=>'barcode_num_in_row',
                    'class'=>'form-control',
                    'value'=>$this->config->item('barcode_num_in_row')));?>
                </div>
            </div>
            
            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_page_width'), 'barcode_page_width',array('class'=>'control-label col-xs-2 required')); ?>
                <div class="col-sm-2">
                    <div class='input-group'>
                        <?php echo form_input(array(
                            'name'=>'barcode_page_width',
                            'id'=>'barcode_page_width',
                            'class'=>'form-control',
                            'value'=>$this->config->item('barcode_page_width')));?>
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
            </div>
            
            <div class="form-group">    
            <?php echo form_label($this->lang->line('config_barcode_page_cellspacing'), 'barcode_page_cellspacing',array('class'=>'control-label col-xs-2 required')); ?>
                <div class='col-sm-2'>
                    <div class="input-group">
                        <?php echo form_input(array(
                            'name'=>'barcode_page_cellspacing',
                            'id'=>'barcode_page_cellspacing',
                            'class'=>'form-control',
                            'value'=>$this->config->item('barcode_page_cellspacing')));?>
                        <span class="input-group-addon">px</span>
                    </div>
                </div>
            </div>
            
            <?php 
            echo form_submit(array(
                'name'=>'submit',
                'id'=>'submit',
                'value'=>$this->lang->line('common_submit'),
                'class'=>'btn btn-primary btn-sm pull-right')
            );
            ?>
        </fieldset>
    </div>
<?php echo form_close(); ?>


<script type='text/javascript'>

//validation and submit handling
$(document).ready(function()
{
    $('#barcode_config_form').validate({
        submitHandler:function(form)
        {
            $(form).ajaxSubmit({
            success:function(response)
            {
                if(response.success)
                {
                    set_feedback(response.message, 'alert alert-dismissible alert-success', false);     
                }
                else
                {
                    set_feedback(response.message, 'alert alert-dismissible alert-danger', true);        
                }
            },
            dataType:'json'
        });

        },
        errorLabelContainer: "#barcode_error_message_box",
        wrapper: "li",
        rules: 
        {
            barcode_width: 
            {
                required:true,
                number:true
            },
            barcode_height: 
            {
                required:true,
                number:true
            },
            barcode_quality: 
            {
                required:true,
                number:true
            },
            barcode_font_size:
            {
                required:true,
                number:true
            },
            barcode_num_in_row:
            {
                required:true,
                number:true
            },
            barcode_page_width:
            {
                required:true,
                number:true
            },
            barcode_page_cellspacing:
            {
                required:true,
                number:true
            }        
        },
        messages: 
        {
            barcode_width:
            {
                required:"<?php echo $this->lang->line('config_default_barcode_width_required'); ?>",
                number:"<?php echo $this->lang->line('config_default_barcode_width_number'); ?>"
            },
            barcode_height:
            {
                required:"<?php echo $this->lang->line('config_default_barcode_height_required'); ?>",
                number:"<?php echo $this->lang->line('config_default_barcode_height_number'); ?>"
            },
            barcode_quality:
            {
                required:"<?php echo $this->lang->line('config_default_barcode_quality_required'); ?>",
                number:"<?php echo $this->lang->line('config_default_barcode_quality_number'); ?>"
            },
            barcode_font_size:
            {
                required:"<?php echo $this->lang->line('config_default_barcode_font_size_required'); ?>",
                number:"<?php echo $this->lang->line('config_default_barcode_font_size_number'); ?>"
            },
            barcode_num_in_row:
            {
                required:"<?php echo $this->lang->line('config_default_barcode_num_in_row_required'); ?>",
                number:"<?php echo $this->lang->line('config_default_barcode_num_in_row_number'); ?>"
            },
            barcode_page_width:
            {
                required:"<?php echo $this->lang->line('config_default_barcode_page_width_required'); ?>",
                number:"<?php echo $this->lang->line('config_default_barcode_page_width_number'); ?>"
            },
            barcode_page_cellspacing:
            {
                required:"<?php echo $this->lang->line('config_default_barcode_page_cellspacing_required'); ?>",
                number:"<?php echo $this->lang->line('config_default_barcode_page_cellspacing_number'); ?>"
            }                            
        }
    });
});
</script>
