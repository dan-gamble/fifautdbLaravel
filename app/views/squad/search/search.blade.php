@extends('layout.master')

@section('content')
<div class="row">
	<div class="col-lg-12 columns">
		<form id="player-search">
			<div class="row">
				<div class="col-lg-6 columns">
					<fieldset id="player-search-nation">
						<legend>Including {{ $name }}</legend>
						<div class="col-lg-8 columns">
							<div class="search-input">
								<i class="fa fa-search fa-2x"></i> <input type="text" placeholder="Player search" id="tags">
								<!-- <p>Nation search will throw up auto completes. If a nation is selected through the search it will get auto checked on the right.</p>
								<p>The list on the right by default will have no top options with no divide. When a nation is 'Selected' it will be appended to the top <code>ul</code> and add a divide to provide easy unselecting.</p> -->
							</div>
							<script>
								$(function() {
									var availableTags = [
									"E",
									"En",
									"Eng",
									"Engl",
									"Engla",
									"Englan",
									"England"
									];
									$( "#tags" ).autocomplete({
										source: availableTags
									});
								});
							</script>
						</div>
						<div class="col-lg-4 columns">
							<ul class="list-unstyled list-h290">
								@for ($i = 1; $i < 3; $i++)
								<li><input id="checkbox1" type="checkbox" checked><label for="checkbox1">Nation Selected {{ $i }}</label></li>
								@endfor
								<li class="divide"></li>
								@for ($i = 1; $i < 9; $i++)
								<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Nation Unselected {{ $i }}</label></li>
								@endfor
							</ul>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-3 columns">
					<fieldset>
						<legend>Prices</legend>
						<div class="row">
							<div class="col-lg-12 columns">
								<label>Console</label>
								<div class="row collapse">
									<div class="small-12 columns">
										<select>
											<option value="ps">Playstation</option>
											<option value="xbox">Xbox</option>
											<option value="pc">PC</option>
										</select>
									</div>
								</div>
							</div>
							<label class="columns">Price</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<input type="text" placeholder="0">
									</div>
									<div class="small-4 columns">
										<span class="postfix">Min</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<input type="text" placeholder="0">
									</div>
									<div class="small-4 columns">
										<span class="postfix">Max</span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-3 columns">
					<fieldset>
						<legend>Prices</legend>
						<div class="row">
							<div class="col-lg-12 columns">
								<label>Console</label>
								<div class="row collapse">
									<div class="small-12 columns">
										<select>
											<option value="ps">Playstation</option>
											<option value="xbox">Xbox</option>
											<option value="pc">PC</option>
										</select>
									</div>
								</div>
							</div>
							<label class="columns">Price</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<input type="text" placeholder="0">
									</div>
									<div class="small-4 columns">
										<span class="postfix">Min</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<input type="text" placeholder="0">
									</div>
									<div class="small-4 columns">
										<span class="postfix">Max</span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 columns">
					<fieldset>
						<legend>Rating / Chemistry</legend>
						<div class="row">
						<label class="columns" for="minrating">Rating</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select id="minrating">
											@for ($i = 1; $i < 100; $i++)
											<option value="minrating{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Min</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select>
											@for ($i = 99; $i > 0; $i--)
											<option value="maxrating{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Max</span>
									</div>
								</div>
							</div>
							<label class="columns" for="minchemistry">Chemistry</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select id="minchemistry">
											@for ($i = 1; $i < 100; $i++)
											<option value="minchemistry{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Min</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select>
											@for ($i = 99; $i > 0; $i--)
											<option value="maxchemistry{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Max</span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-3 columns">
					<fieldset>
						<legend>Skill Moves / Weak Foot</legend>
						<div class="row">
						<label class="columns" for="minskillmoves">Skill Moves</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select id="minskillmoves">
											@for ($i = 1; $i < 6; $i++)
											<option value="minskillmoves{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Min</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select id="maxskillmoves">
											@for ($i = 5; $i > 0; $i--)
											<option value="maxskillmoves{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Max</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="columns" for="minweakfoot">Weak Foot</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select id="minweakfoot">
											@for ($i = 1; $i < 6; $i++)
											<option value="minweakfoot{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Min</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select id="maxweakfoot">
											@for ($i = 5; $i > 0; $i--)
											<option value="maxweakfoot{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Max</span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-3 columns">
					<fieldset>
						<legend>Workrates / Preferred Foot</legend>
						<div class="row">
						<label class="columns">Workrates</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select>
											<option value="workratelow">Low</option>
											<option value="workratemed">Med</option>
											<option value="workratehigh">High</option>
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Def</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<select>
											<option value="low">Low</option>
											<option value="med">Med</option>
											<option value="high">High</option>
										</select>
									</div>
									<div class="small-4 columns">
										<span class="postfix">Att</span>
									</div>
								</div>
							</div>
							<div class="col-lg-12 columns">
								<label>Preferred Foot</label>
								<div class="row collapse">
									<div class="small-12 columns">
										<select>
											<option value="right">Right</option>
											<option value="left">Left</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-3 columns">
					<fieldset>
						<legend>Prices</legend>
						<div class="row">
							<div class="col-lg-12 columns">
								<label>Console</label>
								<div class="row collapse">
									<div class="small-12 columns">
										<select>
											<option value="ps">Playstation</option>
											<option value="xbox">Xbox</option>
											<option value="pc">PC</option>
										</select>
									</div>
								</div>
							</div>
							<label class="columns">Price</label>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<input type="text" placeholder="0">
									</div>
									<div class="small-4 columns">
										<span class="postfix">Min</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<div class="row collapse">
									<div class="small-8 columns">
										<input type="text" placeholder="0">
									</div>
									<div class="small-4 columns">
										<span class="postfix">Max</span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 columns">
					<fieldset id="player-search-pos">
						<legend>Position</legend>
						<ul class="small-block-grid-4 list-unstyled list-checkboxes">
							<li>
								<ul>
									<li><label>Goalkeeper</label></li>
									<li><input id="checkbox1" type="checkbox"><label class="fwb" for="checkbox1">Goalkeeper</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">GK</label></li>
								</ul>
							</li>
							<li>
								<ul>
									<li><label>Defence</label></li>
									<li><label class="fwb" for="right-back">Right Back</label><input id="right-back" type="checkbox" class="hide"></li>
									<li><input id="checkbox1" type="checkbox" name="right-back"><label for="checkbox1">RB</label></li>
									<li><input id="checkbox1" type="checkbox" name="right-back"><label for="checkbox1">RWB</label></li>
									<li><input id="checkbox1" type="checkbox"><label class="fwb" for="checkbox1">Center Back</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">CB</label></li>
									<li><input id="checkbox1" type="checkbox"><label class="fwb" for="checkbox1">Left Back</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">LB</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">LWB</label></li>
								</ul>
							</li>
							<li>
								<ul>
									<li><label>Midfield</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Right Mid</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">RM</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">RW</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">RF</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Center Mid</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">CDM</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">CM</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">CAM</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Left Mid</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">LM</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">LW</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">LF</label></li>
								</ul>
							</li>
							<li>
								<ul>
									<li><label>Attack</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Attacker</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">CF</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">ST</label></li>
								</ul>
							</li>
						</ul>
					</fieldset>
					<script>
						$.fn.checkboxMaster = function(list) {

							return this.on('click', function() {
								$(list).prop('checked', $(this).prop('checked'));
							});

						}
						$('#right-back').checkboxMaster('input[name=right-back]');
					</script>
				</div>
				<div class="col-lg-6 columns">
					<fieldset>
						<legend>Additional</legend>
						<div class="row">
							<div class="col-lg-6 columns">
								<label class="columns">Age</label>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 16; $i < 43; $i++)
												<option value="husker">{{ $i }}</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Min</span>
										</div>
									</div>
								</div>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 42; $i > 15; $i--)
												<option value="husker">{{ $i }}</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Max</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<label class="columns">Age</label>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 1; $i < 6; $i++)
												<option value="husker">{{ $i }}</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Min</span>
										</div>
									</div>
								</div>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 5; $i > 0; $i--)
												<option value="husker">{{ $i }}</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Max</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<label class="columns">Height</label>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 16; $i < 43; $i++)
												<option value="husker">{{ $i }}cm</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Min</span>
										</div>
									</div>
								</div>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 42; $i > 15; $i--)
												<option value="husker">{{ $i }}cm</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Max</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 columns">
								<label class="columns">Weight</label>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 16; $i < 43; $i++)
												<option value="husker">{{ $i }}kg</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Min</span>
										</div>
									</div>
								</div>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
											<select>
												@for ($i = 42; $i > 15; $i--)
												<option value="husker">{{ $i }}kg</option>
												@endfor
											</select>
										</div>
										<div class="small-4 columns">
											<span class="postfix">Max</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 columns">
					<ul class="button-group">
						<li>
							<a href="/player/search/results" class="small button">Search</a>
						</li>
						<li>
							<a href="#" class="small button secondary">Reset</a>
						</li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</div>
@stop



<!--

Can maybe loop through every 1 of these xml's and then pull from it the <binary> uri instead of having to work out the last 3 letters at the end of individual player xml's

#### Start
http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?types=FCZ_PLAYER&sort_asc=false&order_by=serverDate&page_num=1&include_count=true&attributes=cz_visibility%232*cz_isOfficial%23true&page_size=10&rndsd=WjPpNdl0vyZd21UAD0NpXygtKwsygjw8

#### End
http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?types=FCZ_PLAYER&sort_asc=false&order_by=serverDate&page_num=1630&include_count=true&attributes=cz_visibility%232*cz_isOfficial%23true&page_size=10&rndsd=jlJxQni4r6r36162USy5IOKpDbWdsiRC -->
