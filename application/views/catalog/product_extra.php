<div class="newDesign_popover" style="display: none;">

	<div class="may_gInsight hoverpopupDiv" style="display: none;">
									
		<div class="gInsight_header bkpinkycolor">
			<div class="gInsight_header_one">GARMENT INSIGHTS:</div>
			<div class="gInsight_header_two"><?php if(isset($score)&& $score>2) {?>WHY IT WORKS FOR YOU<?php }else{echo 'WHY IT DOES NOT WORK FOR YOU?'; }?></div>
		</div>
		<div class="gInsight_Content">
			<div class="section">
				<table>
					<?php if( !empty($advise) && is_array($advise) ) { ?>
					<tr>
						<th class="th1">Area</th>
						<th class="th2" style="padding-right: 40px;">Style</th>
						<th class="th3">Result</th>
					</tr>
					<?php foreach ($advise as $row){ ?>
							<tr>
								<td class="th1"><strong><?php print $row['area']?></strong></td>
								<td class="th2"><?php print $row['style_item']?></td>
								<td class="th3">
									<span class="starsWrap rating star<?php print $row['result']?>Rate mousehand" style="background:initial;">
										<?php print $star_result[$row['result']] ?>
										
										<?php
											if ($this->flexi_auth->in_group('Administrators')){
												print '('.$row['score'].')';
											}
										?>
									</span>
								</td>
							</tr>
							<?php if (isset($row['reason'])) { ?>
							<tr class="description">
								<td colspan="3">
									<div><strong>Why: </strong><?php print $row['reason'] ?></div>
								</td>
							</tr>
						<?php }
					} // foreach
					
					if ($this->flexi_auth->in_group('Administrators')){
								$scores = array();
								foreach ($advise as $row){
									$scores[] = $row['score'];
								}
							?>
							<tr>
								<td colspan="3">
									<div><?php print '(Average['.(array_sum($scores) / count($scores)).'] + Min['.min($scores).'])/2 = '.$garment['score']; ?></div>
									<div>excelent > 7.3</div>
									<div>good > 6</div>
									<div>ok > 5</div>
									<div>maybe > 3</div>
									<div>avoid <= 3</div>
									</td>
							</tr>
					<?php } } else { ?>
						<tr>
						<td colspan="3">
							<div>Please complete your profile to see the result.</div>
						</td>
						</tr>
					<?php  } ?>
					</table>
					</div>
				</div>
		</div>
	</div>


	<div class="may_StylingRecom hoverpopupDiv" style="display: none;">
													
		<div class="StylingRecom_header bkpinkycolor">
			<div class="StylingRecom_header_one">HOW TO LOOK YOUR BEST</div>
			<div class="StylingRecom_header_two"></div>
		</div>
		<div class="StylingRecom_Content">
			
			<?php if( !empty($advise) && is_array($advise) ) {  foreach ($advise as $row){ if ($row['comment']){ ?>
					<p class="left recommendCommenDes">
					<strong><?php print $row['area'] ?>:</strong>
					<span class="commentSpliter"></span>
					<!-- <span class="commentSpliter"></span> -->
					<!-- <span class="bold-dash">-&nbsp;</span>  -->
					<!-- <?php // print implode('<span class="commentSpliter"></span><span class="bold-dash" style="float:left;">-&nbsp;</span> ', $row['comment']) ?> -->
					<?php foreach($row['comment'] as $com){ ?>
					
					<span>
						<span class="bold-dash" style="float:left;width:9%;font-size:37px;line-height:10px;padding-top:2px;">&bull; &nbsp; &nbsp; &nbsp;</span>
						<span style="float:left;width:91%;padding-bottom: 5px;"><?php echo $com; ?> </span>
					</span>
					<span class="commentSpliter"></span>
					
					 <?php } ?>
					
			</p>
			<?php }} } else { ?>
					
					<div>Please complete your profile to see the result.</div>
					
			<?php } ?>
		</div>
	</div>

</div>