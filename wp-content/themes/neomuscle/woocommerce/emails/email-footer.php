<?php
/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
															</div>
														</td>
													</tr>
												</table>
												<!-- End Content -->
											</td>
										</tr>
									</table>
									<!-- End Body -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Footer -->
									<table border="0" cellpadding="10" cellspacing="0" width="100%" id="template_footer">
										<tr>
											<td valign="top">
												<table border="0" cellpadding="10" cellspacing="0" width="100%">
													<tr>
<!--														<td colspan="2" valign="middle" id="credit">-->
<!--															--><?php //echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
<!--														</td>-->
														<td align="center" valign="middle" id="footer-contacts">
															Заказы и консультации по телефону <br>
															<a href="tel: +380682081717">(068) 208-17-17</a> (с 11 до 18 без выходных)
														</td>
														<td align="right" valign="middle" id="footer-social-links">
															<a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/email/facebook.svg" alt="facebook"></a>
															<a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/email/instagram.svg" alt="instagram"></a>
															<a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/email/telegram.svg" alt="telegram"></a>
															<a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/email/viber.svg" alt="viber"></a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<!-- End Footer -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
