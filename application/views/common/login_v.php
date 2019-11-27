<div class="luft-login-box">
	<div class="luft-logo-wrapper">
		
	</div>

	<?php echo form_open( 'user/login' ); ?>

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
			<?php 
				echo form_label(get_msg('label_password'), 'password');
				echo form_password( array(
					'name' => 'password',
					'placeholder' => get_msg( 'placeholder_password' ),
					'id' => 'password',
					'autocomplete' => 'off',
					'required' => 'required',
					
				) );
			?>
		</div>
		
		<div class="luft-submit-wrapper">

			<div class="luft-form-row luft-submit-type">
				<?php echo form_submit('login', get_msg( 'login' )); ?>
			</div>	
		</div>	
	<?php echo form_close( '' ); ?> 

	
</div>