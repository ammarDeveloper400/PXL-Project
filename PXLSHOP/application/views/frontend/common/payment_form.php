<div class="form_input">
							<div class="form-group wd100">
								<label>Name on card</label>
								<input type="text" name="name_on_card" id="name_on_card" required class="custom_payment_input" value="">
							</div>

							<div class="form-group wd100">
								<label>
									<span>Card Number</span>
									<span><img src="<?php echo $assets;?>images/cards.svg"></span>
								</label>
								<div class="relative">
									<div class="icon_position_right">
										<svg width="43" height="30" viewBox="0 0 43 30" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="1" y="0.5" width="41.5" height="29" rx="3.5" fill="white" stroke="#B2BCCA"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9737 21.0369C20.4937 22.2845 18.5738 23.0376 16.4759 23.0376C11.7948 23.0376 8 19.288 8 14.6626C8 10.0372 11.7948 6.2876 16.4759 6.2876C18.5738 6.2876 20.4937 7.04072 21.9737 8.28827C23.4538 7.04072 25.3737 6.2876 27.4716 6.2876C32.1527 6.2876 35.9474 10.0372 35.9474 14.6626C35.9474 19.288 32.1527 23.0376 27.4716 23.0376C25.3737 23.0376 23.4538 22.2845 21.9737 21.0369Z" fill="#ED0006"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9736 21.037C23.7961 19.5008 24.9517 17.2151 24.9517 14.6626C24.9517 12.1101 23.7961 9.82435 21.9736 8.28822C23.4537 7.0407 25.3735 6.2876 27.4714 6.2876C32.1525 6.2876 35.9473 10.0372 35.9473 14.6626C35.9473 19.288 32.1525 23.0376 27.4714 23.0376C25.3735 23.0376 23.4537 22.2845 21.9736 21.037Z" fill="#F9A000"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9736 21.0367C23.796 19.5006 24.9516 17.2148 24.9516 14.6624C24.9516 12.11 23.796 9.82422 21.9736 8.28809C20.1512 9.82422 18.9956 12.11 18.9956 14.6624C18.9956 17.2148 20.1512 19.5006 21.9736 21.0367Z" fill="#FD6020"/>
											</svg>
									</div>
									<input type="text" name="card_number" id="card_number" required class="custom_payment_input" value="">
								</div>
							</div>

							<div class="card_year_month">
								<div class="form-group wd100">
									<label>Expiration</label>
									<div class="year_mon">
										<input type="text" minlength="2" maxlength="2" name="expiry_month" id="expiry_month" required class="custom_payment_input" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										<span>/</span>
										<input type="text" minlength="4" maxlength="4" name="expiry_year" id="expiry_year" required class="custom_payment_input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '');" value="">
									</div>
								</div>
								<div class="form-group wd100">
									<label>
										CVC
										<svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_822_314)">
											<path d="M12.6993 22.9675C7.04896 22.9675 2.46875 18.3898 2.46875 12.7425C2.46875 7.09529 7.04896 2.51758 12.6993 2.51758C18.3496 2.51758 22.9298 7.09529 22.9298 12.7425C22.9298 18.3898 18.3496 22.9675 12.6993 22.9675ZM12.6993 20.9225C14.8699 20.9225 16.9517 20.0607 18.4866 18.5266C20.0214 16.9926 20.8837 14.912 20.8837 12.7425C20.8837 10.5731 20.0214 8.49246 18.4866 6.95842C16.9517 5.42438 14.8699 4.56257 12.6993 4.56257C10.5286 4.56257 8.4469 5.42438 6.91202 6.95842C5.37714 8.49246 4.51486 10.5731 4.51486 12.7425C4.51486 14.912 5.37714 16.9926 6.91202 18.5266C8.4469 20.0607 10.5286 20.9225 12.6993 20.9225ZM11.6762 15.81H13.7223V17.855H11.6762V15.81ZM13.7223 14.128V14.7875H11.6762V13.2538C11.6762 12.9826 11.784 12.7225 11.9759 12.5308C12.1677 12.339 12.428 12.2313 12.6993 12.2313C12.9899 12.2313 13.2746 12.1488 13.5201 11.9934C13.7657 11.838 13.962 11.6161 14.0863 11.3536C14.2106 11.091 14.2578 10.7986 14.2223 10.5103C14.1868 10.222 14.0701 9.94967 13.8859 9.72505C13.7016 9.50044 13.4573 9.33274 13.1814 9.24147C12.9055 9.15021 12.6093 9.13912 12.3273 9.20951C12.0454 9.27989 11.7892 9.42886 11.5886 9.63907C11.3881 9.84928 11.2513 10.1121 11.1944 10.3969L9.18714 9.99508C9.31158 9.37349 9.59893 8.79608 10.0198 8.32186C10.4407 7.84764 10.9801 7.49363 11.5827 7.29602C12.1854 7.09841 12.8297 7.06429 13.4499 7.19714C14.0701 7.33 14.6438 7.62506 15.1125 8.05216C15.5812 8.47927 15.928 9.02311 16.1174 9.62807C16.3069 10.233 16.3322 10.8774 16.1908 11.4954C16.0494 12.1134 15.7464 12.6827 15.3127 13.1453C14.879 13.6078 14.3302 13.9469 13.7223 14.128Z" fill="#718096"/>
											</g>
											<defs>
											<clipPath id="clip0_822_314">
											<rect width="24.5533" height="24.5399" fill="white" transform="translate(0.422852 0.472656)"/>
											</clipPath>
											</defs>
											</svg>

									</label>
									<input type="text" name="cvv" minlength="3" maxlength="3" id="cvv" required class="custom_payment_input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="">
								</div>
							</div>

						</div>