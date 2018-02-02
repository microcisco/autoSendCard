

<?php

header("Content-Type: text/html; charset=utf-8");
function getM1($goal,$content,$foot,$fromName){

	$txt = '<meta http-equiv="Content-Type" Content="text/html;charset=utf8"/><div class="qmbox qm_con_body_content" id="mailContentContainer">
<style type="text/css">.qmbox body,.qmbox #bodyTable,.qmbox #bodyCell{ height: 100% !important; margin: 0; padding: 0; width: 100% !important;}.qmbox table { border-collapse: collapse; }.qmbox img,.qmbox a img{ border: 0; outline: none; text-decoration: none; }.qmbox h1,.qmbox h2,.qmbox h3,.qmbox h4,.qmbox h5,.qmbox h6{ margin: 0; padding: 0; }.qmbox p { margin: 1em 0; padding: 0; }.qmbox a { word-wrap: break-word; }.qmbox .ReadMsgBody { width: 100%; }.qmbox .ExternalClass { width: 100%; }.qmbox .ExternalClass,.qmbox .ExternalClass p,.qmbox .ExternalClass span,.qmbox .ExternalClass font,.qmbox .ExternalClass td,.qmbox .ExternalClass div{ line-height: 100%; }.qmbox table,.qmbox td{ mso-table-lspace: 0pt; mso-table-rspace: 0pt; }.qmbox #outlook a { padding: 0; }.qmbox img { -ms-interpolation-mode: bicubic; }.qmbox body,.qmbox table,.qmbox td,.qmbox p,.qmbox a,.qmbox li,.qmbox blockquote{ -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; }.qmbox #bodyCell { padding: 20px; }.qmbox .image { vertical-align: bottom; }.qmbox .textContent img { height: auto !important; }.qmbox body,.qmbox #bodyTable{ background-color: #F2F2F2; }.qmbox #bodyCell { border-top: 0; }.qmbox h1 { color: #606060 !important; display: block; font-family: Helvetica; font-size: 40px; font-style: normal; font-weight: bold; line-height: 125%; letter-spacing: -1px; margin: 0; text-align: left; }.qmbox h2 { color: #404040 !important; display: block; font-family: Helvetica; font-size: 26px; font-style: normal; font-weight: bold; line-height: 125%; letter-spacing: -.75px; margin: 0; text-align: left; }.qmbox h3 { color: #606060 !important; display: block; font-family: Helvetica; font-size: 18px; font-style: normal; font-weight: bold; line-height: 125%; letter-spacing: -.5px; margin: 0; text-align: left; }.qmbox h4 { color: #808080 !important; display: block; font-family: Helvetica; font-size: 16px; font-style: normal; font-weight: bold; line-height: 125%; letter-spacing: normal; margin: 0; text-align: left; }.qmbox #templatePreheader { background-color: #FFFFFF; border-top: 0; border-bottom: 0; }.qmbox .preheaderContainer .textContent,.qmbox .preheaderContainer .textContent p{ color: #606060; font-family: Helvetica; font-size: 11px; line-height: 125%; text-align: left; }.qmbox .preheaderContainer .textContent a { color: #606060; font-weight: normal; text-decoration: underline; }.qmbox #templateHeader { background-color: #FFFFFF; border-top: 0; border-bottom: 0; }.qmbox .headerContainer .textContent,.qmbox .headerContainer .textContent p{ color: #606060; font-family: Helvetica; font-size: 15px; line-height: 150%; text-align: left; }.qmbox .headerContainer .textContent a { color: #6DC6DD; font-weight: normal; text-decoration: underline; }.qmbox #templateBody { background-color: #FFFFFF; border-top: 0; border-bottom: 0; }.qmbox .bodyContainer .textContent,.qmbox .bodyContainer .textContent p{ color: #606060; font-family: Helvetica; font-size: 15px; line-height: 150%; text-align: left; }.qmbox .bodyContainer .textContent a { color: #6DC6DD; font-weight: normal; text-decoration: underline; }.qmbox #templateColumns { background-color: #FFFFFF; border-top: 0; border-bottom: 0; }.qmbox .imageContent img { vertical-align: middle; max-width: 100%; }.qmbox .leftColumnContainer .textContent,.qmbox .leftColumnContainer .textContent p{ color: #606060; font-family: Helvetica; font-size: 15px; line-height: 150%; text-align: left; }.qmbox .leftColumnContainer .textContent a { color: #6DC6DD; font-weight: normal; text-decoration: underline; }.qmbox .centerColumnContainer .textContent,.qmbox .centerColumnContainer .textContent p{ color: #606060; font-family: Helvetica; font-size: 15px; line-height: 150%; text-align: left; }.qmbox .centerColumnContainer .textContent a { color: #6DC6DD; font-weight: normal; text-decoration: underline; }.qmbox .rightColumnContainer .textContent,.qmbox .rightColumnContainer .textContent p{ color: #606060; font-family: Helvetica; font-size: 15px; line-height: 150%; text-align: left; }.qmbox .rightColumnContainer .textContent a { color: #6DC6DD; font-weight: normal; text-decoration: underline; }.qmbox #templateFooter { background-color: #F2F2F2; border-top: 0; border-bottom: 0; }.qmbox .footerContainer .textContent,.qmbox .footerContainer .textContent p{ color: #606060; font-family: Helvetica; font-size: 11px; line-height: 125%; text-align: left; }.qmbox .footerContainer .textContent a { color: #606060; font-weight: normal; text-decoration: underline; }
</style>
<center>
<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" id="bodyTable" width="100%">
	<tbody>
		<tr>
			<td align="center" id="bodyCell" valign="top">
			<table border="0" cellpadding="0" cellspacing="0" id="templateContainer" width="600">
				<tbody>
					<tr>
						<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" id="templatePreheader" width="100%">
							<tbody>
								<tr>
									<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" class="templateContainer" width="600">
										<tbody>
											<tr>
												<td class="preheaderContainer tpl-container dragTarget" data-container="preheader" valign="top">
												<div class="tpl-block tpl-image" style="margin-top: 0px; margin-bottom: 0px; border: 0px solid rgb(0, 0, 0); border-radius: 0px;">
												<div data-attach-point="containerNode">
												<table border="0" cellpadding="0" cellspacing="0" class="imageBlock" width="100%">
													<tbody class="imageBlockOuter">
														<tr>
															<td class="imageBlockInner" valign="top">
															<table align="left" border="0" cellpadding="0" cellspacing="0" class="imageContentContainer" width="100%">
																<tbody>
																	<tr>
																		<td align="center" class="imageContent" style="padding: 10px; text-align: -webkit-center; background-color: rgb(255, 255, 255);" valign="top"><img src="http://pan.cccyun.cc/view.php/17c59e9eb4d779188a892c583facf558.jpg" /></td>
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</div>
												</div>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" id="templateHeader" width="100%">
							<tbody>
								<tr>
									<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" class="templateContainer" width="600">
										<tbody>
											<tr>
												<td class="headerContainer tpl-container dragTarget" data-container="header" valign="top">
												<div class="block tpl-block text-block" style="">
												<div data-attach-point="containerNode">
												<table border="0" cellpadding="0" cellspacing="0" class="textBlock" width="100%">
													<tbody class="textBlockOuter">
														<tr>
															<td class="textBlockInner" valign="top">
															<table align="left" border="0" cellpadding="0" cellspacing="0" class="textContentContainer" width="600">
																<tbody>
																	<tr>
																		<td class="textContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;background-color:#ffffff" valign="top">
																		<div style="box-sizing: border-box; margin: 0px 0px 10px; font-family: "Microsoft YaHei", Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">
																		<p>尊敬的：'.$goal.'</p>
																		<strong>'.$content.'</strong>

																		<p style="  color: #aeaeae;  font-size: 12px;">'.$foot.'</p>
																		</div>
																		</td>
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</div>
												</div>

												<div class="tpl-block tpl-text" style="margin-top: 0px; margin-bottom: 0px; border: 0px solid rgb(0, 0, 0); border-radius: 0px;">
												<div data-attach-point="containerNode">
												<table border="0" cellpadding="0" cellspacing="0" class="textBlock" width="100%">
													<tbody class="textBlockOuter">
														<tr>
															<td class="textBlockInner" valign="top">
															<table align="left" border="0" cellpadding="0" cellspacing="0" class="textContentContainer" width="100%">
																<tbody>
																	<tr>
																		<td align="center" class="textContent" style="padding: 10px 0px; text-align: left; background: rgb(255, 255, 255);" valign="top">
																		<div style="text-align: right;padding-right:80px;"><strong><span style="color:#317bcf;"><span style="font-family:microsoft yahei;">'.$fromName.'</span></span></strong></div>
																		</td>
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</div>
												</div>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" id="templateBody" width="100%">
							<tbody>
								<tr>
									<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" class="templateContainer" width="600">
										<tbody>
											<tr>
												<td class="bodyContainer tpl-container dragTarget" data-container="body" valign="top">
												<div class="ghost-source">&nbsp;</div>

												<div class="tpl-block tpl-divider" style="margin-top: 0px; margin-bottom: 0px; border: 0px solid rgb(0, 0, 0); border-radius: 0px;">
												<div data-attach-point="containerNode">
												<table border="0" cellpadding="0" cellspacing="0" class="dividerBlock" width="100%">
													<tbody class="dividerBlockOuter">
														<tr>
															<td class="dividerBlockInner">
															<table border="0" cellpadding="0" cellspacing="0" class="dividerContentContainer" width="100%">
																<tbody>
																	<tr>
																		<td align="center" class="dividerContent" style="margin-top: 10px; margin-bottom: 15px; padding: 10px 20px; text-align: start; background-color: rgb(255, 255, 255);">
																		<div style="width:100%;height:1px;background: rgb(153, 153, 153);">&nbsp;</div>
																		</td>
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</div>
												</div>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" id="templateFooter" width="100%">
							<tbody>
								<tr>
									<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" class="templateContainer" width="600">
										<tbody>
											<tr>
												<td class="footerContainer tpl-container dragTarget" data-container="footer" valign="top">
												<div class="block tpl-block text-block">
												<div data-attach-point="containerNode">
												<table border="0" cellpadding="0" cellspacing="0" class="textBlock" width="100%">
													<tbody class="textBlockOuter">
														<tr>
															<td class="textBlockInner" valign="top">
															<table align="left" border="0" cellpadding="0" cellspacing="0" class="textContentContainer" width="600">
																<tbody>
																	<tr>
																		<td class="textContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;background-color:#ffffff" valign="top">
																		<div style="line-height: 20.7999992370605px; text-align: center;"><span style="font-family: "microsoft yahei";">系统邮件，请勿回复</span></div>

																		<div style="line-height: 20.7999992370605px; text-align: center;"><span style="font-family: "microsoft yahei";">Copyright &copy; 2014-2017&nbsp;AYANGW &nbsp;All rights reserved.</span></div>
																		</td>
																	</tr>
																</tbody>
															</table>
															</td>
														</tr>
													</tbody>
												</table>
												</div>
												</div>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
</center>
</div>
';
	return $txt;
}

//echo getM1("99","123","sada","sadas");
?>