@extends('layout.master')

@section('page-heading')
Player Search
@stop

@section('content')
<div class="row">
	<div class="col-lg-12 columns">
		{{ Form::open(['route' => 'playersearch.results', 'method' => 'get']) }}
        <div class="row">
            <div class="col-lg-3 columns">
                <fieldset>
                    <legend>Rating / Card Type</legend>
                    <div class="row">
                        <label class="columns" for="minrating">Rating</label>
                        <div class="col-lg-6 columns">
                            <div class="row collapse">
                                <div class="small-8 columns">
                                    {{ Form::selectRange('minrating', 1, 99) }}
                                </div>
                                <div class="small-4 columns">
                                    <span class="postfix">Min</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 columns">
                            <div class="row collapse">
                                <div class="small-8 columns">
                                    {{ Form::selectRange('maxrating', 99, 1) }}
                                </div>
                                <div class="small-4 columns">
                                    <span class="postfix">Max</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 columns">
                            <label for="cardtype">Card Types</label>
                            <div class="row collapse">
                                <div class="small-12 columns">
                                    <select id="cardtype">
                                        @for ($i = 99; $i > 0; $i--)
                                        <option value="cardtype{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
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
                                    {{ Form::selectRange('minskill', 1, 5) }}
                                </div>
                                <div class="small-4 columns">
                                    <span class="postfix">Min</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 columns">
                            <div class="row collapse">
                                <div class="small-8 columns">
                                    {{ Form::selectRange('maxskill', 5, 1) }}
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
                                    {{ Form::selectRange('minweak', 1, 5) }}
                                </div>
                                <div class="small-4 columns">
                                    <span class="postfix">Min</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 columns">
                            <div class="row collapse">
                                <div class="small-8 columns">
                                    {{ Form::selectRange('maxweak', 5, 1) }}
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
                                    {{ Form::select('defrates', array('' => '', '1' => 'Low', '0' => 'Medium', '2' => 'High'), '') }}
                                </div>
                                <div class="small-4 columns">
                                    <span class="postfix">Def</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 columns">
                            <div class="row collapse">
                                <div class="small-8 columns">
                                    {{ Form::select('attrates', array('' => '', '1' => 'Low', '0' => 'Medium', '2' => 'High'), '') }}
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
                                    {{ Form::select('preffoot', array('2' => 'Left', '1' => 'Right'), 'R') }}
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
					<fieldset id="player-search-nation">
						<legend>Nation</legend>
						<div class="col-lg-8 columns">
							<div class="search-input">
								<i class="fa fa-search fa-2x"></i> <input type="text" placeholder="Nation search" id="tags">
								{{-- <p>Nation search will throw up auto completes. If a nation is selected through the search it will get auto checked on the right.</p>
								<p>The list on the right by default will have no top options with no divide. When a nation is 'Selected' it will be appended to the top <code>ul</code> and add a divide to provide easy unselecting.</p> --}}
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
				<div class="col-lg-6 columns">
					<fieldset id="player-search-league">
						<legend>League / Club</legend>
						<div class="col-lg-8 columns">
							<div class="search-input">
								<i class="fa fa-search fa-2x"></i> <input type="text" placeholder="League Search" id="tags">
								<div class="labels">
									<a href="#" class="radius secondary label">Barclays PL <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Liga BBVA <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Serie A <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Serie B <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Legends <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Liga do Brasil <i class="fa fa-times"></i></a>
								</div>
							</div>
							<div class="search-input">
								<i class="fa fa-search fa-2x"></i> <input type="text" placeholder="Club Search" id="tags">
								<div class="labels">
									<a href="#" class="radius secondary label">Manchester United <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Real Madrid <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Juventus <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Inter Milan <i class="fa fa-times"></i></a>
									<a href="#" class="radius secondary label">Roma <i class="fa fa-times"></i></a>
								</div>
								<!-- <p>When a league or club is selected it will create an label below the respective search field that the user can click to remove.</p>
								<p>The right hand checkbox list will default to unselected leagues, when a league is selected it will get removed from the list, or potentially stay in the list checked and unchecking it will remove the label as well.</p>
								<p>The right hand list will change to update when the search box is clicked in to. When you click into the club search input box the right hand options will update to clubs based on the leagues you have selected. If no leagues have been selected then just show a full club list or maybe show a text piece asking them to pick an league.</p> -->
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
								@for ($i = 1; $i < 21; $i++)
								<li><input id="checkbox1" type="checkbox"><label for="checkbox1">League Unselected {{ $i }}</label></li>
								@endfor
							</ul>
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
                                    <li>
                                        {{ Form::checkbox('gk', '0') }}
                                        {{ Form::label('gk', 'GK') }}
                                    </li>
								</ul>
							</li>
							<li>
								<ul>
									<li><label>Defence</label></li>
									<li><label class="fwb" for="right-back">Right Back</label><input id="right-back" type="checkbox" class="hide"></li>
                                    <li>
                                        {{ Form::checkbox('rb', '3') }}
                                        {{ Form::label('rb', 'RB') }}
                                    </li>
                                    <li>
                                        {{ Form::checkbox('rwb', '2') }}
                                        {{ Form::label('rwb', 'RWB') }}
                                    </li>
									<li><input id="checkbox1" type="checkbox"><label class="fwb" for="checkbox1">Center Back</label></li>
                                    <li>
                                        {{ Form::checkbox('cb', '5') }}
                                        {{ Form::label('cb', 'CB') }}
                                    </li>
									<li><input id="checkbox1" type="checkbox"><label class="fwb" for="checkbox1">Left Back</label></li>
                                    <li>
                                        {{ Form::checkbox('lb', '7') }}
                                        {{ Form::label('lb', 'LB') }}
                                    </li>
                                    <li>
                                        {{ Form::checkbox('lwb', '8') }}
                                        {{ Form::label('lwb', 'LWB') }}
                                    </li>
								</ul>
							</li>
							<li>
								<ul>
									<li><label>Midfield</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Right Mid</label></li>
                                    <li>
                                        {{ Form::checkbox('rm', '12') }}
                                        {{ Form::label('rm', 'RM') }}
                                    </li>
                                    <li>
                                        {{ Form::checkbox('rw', '23') }}
                                        {{ Form::label('rw', 'RW') }}
                                    </li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Center Mid</label></li>
                                    <li>
                                        {{ Form::checkbox('cdm', '10') }}
                                        {{ Form::label('cdm', 'CDM') }}
                                    </li>
                                    <li>
                                        {{ Form::checkbox('cm', '14') }}
                                        {{ Form::label('cm', 'CM') }}
                                    </li>
                                    <li>
                                        {{ Form::checkbox('cam', '18') }}
                                        {{ Form::label('cam', 'CAM') }}
                                    </li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Left Mid</label></li>
                                    <li>
                                        {{ Form::checkbox('lm', '16') }}
                                        {{ Form::label('lm', 'LM') }}
                                    </li>
                                    <li>
                                        {{ Form::checkbox('lw', '27') }}
                                        {{ Form::label('lw', 'LW') }}
                                    </li>
								</ul>
							</li>
							<li>
								<ul>
									<li><label>Attack</label></li>
									<li><input id="checkbox1" type="checkbox"><label for="checkbox1">Attacker</label></li>
                                    <li>
                                        {{ Form::checkbox('cf', '21') }}
                                        {{ Form::label('cf', 'CF') }}
                                    </li>
                                    <li>
                                        {{ Form::checkbox('st', '25') }}
                                        {{ Form::label('st', 'ST') }}
                                    </li>
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
                                            {{ Form::selectRange('minage', 16, 50) }}
										</div>
										<div class="small-4 columns">
											<span class="postfix">Min</span>
										</div>
									</div>
								</div>
								<div class="col-lg-6 columns">
									<div class="row collapse">
										<div class="small-8 columns">
                                            {{ Form::selectRange('maxage', 50, 16) }}
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
                            {{ Form::submit('Search', ['class' => 'small button' ]) }}
						</li>
						<li>
							<a href="#" class="small button secondary">Reset</a>
						</li>
					</ul>
				</div>
			</div>
        {{ Form::close() }}
	</div>
</div>
@stop



<!--

Can maybe loop through every 1 of these xml's and then pull from it the <binary> uri instead of having to work out the last 3 letters at the end of individual player xml's

#### Start
http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?types=FCZ_PLAYER&sort_asc=false&order_by=serverDate&page_num=1&include_count=true&attributes=cz_visibility%232*cz_isOfficial%23true&page_size=10&rndsd=WjPpNdl0vyZd21UAD0NpXygtKwsygjw8

#### End
http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?types=FCZ_PLAYER&sort_asc=false&order_by=serverDate&page_num=1630&include_count=true&attributes=cz_visibility%232*cz_isOfficial%23true&page_size=10&rndsd=jlJxQni4r6r36162USy5IOKpDbWdsiRC -->
