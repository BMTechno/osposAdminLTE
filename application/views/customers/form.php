<div class="modal-dialog" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-content">
		<div class="modal-header">
			<strong><?php echo $this->lang->line('customers_new'); ?></strong>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body" >
			<?php echo form_open('customers/save/'.$person_info->person_id,array('id'=>'customer_form','class' => 'form-horizontal')); ?>
				<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
				<ul id="error_message_box" class="error_message_box"></ul>
				<fieldset id="customer_basic_info">
					<legend><?php echo $this->lang->line("customers_basic_information"); ?></legend>
					<?php $this->load->view("people/form_basic_info"); ?>

					<div class="form-group">	
					<?php echo form_label($this->lang->line('customers_company_name').':', 'company_name',array('class'=>'control-label col-xs-4')); ?>
						<div class='col-xs-6'>
						<?php echo form_input(array(
							'name'=>'company_name',
							'class'=>'form-control',
							'value'=>$person_info->company_name)
						);?>
						</div>
					</div>

					<div class="form-group">	
					<?php echo form_label($this->lang->line('customers_account_number').':', 'account_number',array('class'=>'control-label col-xs-4')); ?>
						<div class='col-xs-6'>
						<?php echo form_input(array(
							'name'=>'account_number',
							'id'=>'account_number',
							'class'=>'account_number form-control',
							'value'=>$person_info->account_number)
						);?>
						</div>
					</div>

					<div class="form-group">	
					<?php echo form_label($this->lang->line('customers_taxable').':', 'taxable',array('class'=>'control-label col-xs-4')); ?>
						<div class='col-xs-6'>
						<?php echo form_checkbox('taxable', '1', $person_info->taxable == '' ? TRUE : (boolean)$person_info->taxable);?>
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
			<?php echo form_close(); ?>
			<script type='text/javascript'>

			//validation and submit handling
			$(document).ready(function()
			{

				$.validator.addMethod("account_number", function(value, element) 
				{
					return JSON.parse($.ajax(
					{
						  type: 'POST',
						  url: '<?php echo site_url($controller_name . "/check_account_number")?>',
						  data: {'person_id' : '<?php echo $person_info->person_id; ?>', 'account_number' : $(element).val() },
						  success: function(response) 
						  {
							  success=response.success;
						  },
						  async:false,
						  dataType: 'json'
					}).responseText).success;
					
				}, '<?php echo $this->lang->line("customers_account_number_duplicate"); ?>');

				$('#customer_form').validate({
					submitHandler:function(form)
					{
						$(form).ajaxSubmit({
						success:function(response)
						{
							//tb_remove();
							$('.modal').modal('hide');
							post_person_form_submit(response);
						},
						dataType:'json'
					});

					},
					errorLabelContainer: "#error_message_box",
					wrapper: "li",
					rules: 
					{
						first_name: "required",
						last_name: "required",
						email: "email",
						account_number: { account_number: true }
					},
					messages: 
					{
						first_name: "<?php echo $this->lang->line('common_first_name_required'); ?>",
						last_name: "<?php echo $this->lang->line('common_last_name_required'); ?>",
						email: "<?php echo $this->lang->line('common_email_invalid_format'); ?>"
					}
				});
			});
			</script>
		</div>
	</div>
</div>