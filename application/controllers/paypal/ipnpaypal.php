<?php

class Ipnpaypal extends CI_Controller {

	
    // To handle the IPN post made by PayPal (uses the Paypal_Lib library).
    public function ipn()
    {
		if( !empty( $_POST )){
			$this->load->library('paypal/PayPal_IPN'); // Load the library

			// Try to get the IPN data.
			if ($this->paypal_ipn->validateIPN())
			{
				// Succeeded, now let's extract the order
				$this->paypal_ipn->extractOrder();

				// And we save the order now (persist and extract are separate because you might only want to persist the order in certain circumstances).
				$this->paypal_ipn->saveOrder();

				// Now let's check what the payment status is and act accordingly
				if ($this->paypal_ipn->orderStatus == PayPal_IPN::PAID)
				{
					/* HEATH WARNING:
					 *
					 * You'll have to create your own email template using Smarty, Twig or similar for this to work.
					 * If you do not have this, then the code below will cause your Paypal IPN responses to fail
					 * with 500 errors without your knowledge.
					 */
					
					// Configure to send HTML emails.
					//$this->load->library('email');
					//$mail_config['mailtype'] = 'html';
					//$this->email->initialize($mail_config);

					// Prepare the variables to populate the email template:
					$data = $this->paypal_ipn->order;
					$data['items'] = $this->paypal_ipn->orderItems;

					// Now construct the email
					//$emailBody = $this->smarty->view('confirmation_email.tpl', $data, TRUE); // You'll have to create your own email template using Smarty, Twig or similar

					// Finish configuring email contents and send.
					/*
					$this->email->to($data['payer_email'], ($data['first_name'] . ' ' . $data['last_name']));
					$this->email->bcc('sales@CHANGEME.com');
					$this->email->from('support@CHANGEME.com', 'CHANGEME');
					$this->email->subject('Order confirmation');
					$this->email->message($emailBody);
					$this->email->send();
					*/
				}
			}
			else // Just redirect to the root URL
			{
				$this->load->helper('url');
				redirect('/index', 'refresh');
			}
		} else {
			$this->load->helper('url');
			redirect('/index', 'refresh');
		}
    }
	
	
}
