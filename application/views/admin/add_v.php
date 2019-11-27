<?php echo form_open( 'user/add' ); ?>

		<div class="luft-form-row luft-input-type">
			<?php echo form_label(get_msg( 'label_username' ), 'username');
			echo form_input( array(
				'name' => 'username',
				'placeholder' => get_msg( 'placeholder_username' ),
				'id' => 'username',
				'required' => 'required',
				
			) ); ?>
		</div>

		<div class="luft-form-row luft-input-type">
			<?php echo form_label(get_msg( 'label_address' ), 'Address');
			echo form_input( array(
				'name' => 'address',
				'placeholder' => get_msg( 'placeholder_address' ),
				'id' => 'address',
				'required' => 'required',
			) ); ?>
		</div>

		<div class="luft-form-row luft-input-type">
			<?php echo form_label(get_msg( 'label_phone_number' ), 'number');
			echo form_input( array(
				'name' => 'number',
				'placeholder' => get_msg( 'placeholder_phone_number' ),
				'id' => 'number',
				'required' => 'required',
			) ); ?>
		</div>
		
		<div class="luft-submit-wrapper">

			<div class="luft-form-row luft-submit-type">
				<?php echo form_submit('login', get_msg( 'add' )); ?>
			</div>	
		</div>	
	<?php echo form_close( '' ); ?> 