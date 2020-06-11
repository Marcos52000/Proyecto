
 <nav id="sidebar">
            <div class="sidebar-header">
                <h3>INS CDM</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#ESOSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">ESO</a>
                    <ul class="collapse list-unstyled" id="ESOSubmenu">
                    <?php  
                			$date = date("Y-m-d");
                	?>
                	@foreach($Pagaments as $Pagament)
                		@if($Pagament->nivell=='ESO')
                			@if($Pagament->data_fi > $date && $Pagament->estat == 'Actiu')
                				<li>
                            		<a href="/pagament/{{$Pagament->id}}">{{$Pagament->titol}}</a>
                        		</li>
                			@endif
                		@endif
                	@endforeach
                    </ul>
                </li>
                <li>
                    <a href="#BATSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">BATXILLERAT</a>
                    <ul class="collapse list-unstyled" id="BATSubmenu">
					@foreach($Pagaments as $Pagament)
                		@if($Pagament->nivell=='BAT')
                			@if($Pagament->data_fi > $date && $Pagament->estat == 'Actiu')
                				<li>
                            		<a href="/pagament/{{$Pagament->id}}">{{$Pagament->titol}}</a>
                        		</li>
                			@endif
                		@endif
                	@endforeach
            
                    </ul>
                </li>
                <li>
                    <a href="#FPSubmenu"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">CICLES FORMATIUS</a>
                       <ul class="collapse list-unstyled" id="FPSubmenu">
                       @foreach($Pagaments as $Pagament)
                		@if($Pagament->nivell=='CF')
                			@if($Pagament->data_fi > $date && $Pagament->estat == 'Actiu')
                				<li>
                            		<a href="/pagament/{{$Pagament->id}}">{{$Pagament->titol}}</a>
                        		</li>
                			@endif
                		@endif
                	@endforeach
            
                    </ul>
                </li>
                 <li>
                    <a href="#PROFSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">PROFESSORAT</a>
                    <ul class="collapse list-unstyled" id="PROFSubmenu">
					@foreach($Pagaments as $Pagament)
                		@if($Pagament->nivell=='PROF')
                			@if($Pagament->data_fi > $date && $Pagament->estat == 'Actiu')
                				<li>
                            		<a href="/pagament/{{$Pagament->id}}">{{$Pagament->titol}}</a>
                        		</li>
                			@endif
                		@endif
                	@endforeach
            
                    </ul>
                </li>
                <li>
                    <a href="/login">LOGIN</a> 
                </li>
   
            </ul>

        </nav>
