@extends('master-admin')

@section('content')

	<!-- Section: boxes -->

	@if(!empty($data_balita) && !empty($data_periksa))

    <section id="boxes" class="home-section paddingtop-80">
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box">

							{!! Form::open(['route' => 'get_pdf_periksa']) !!}

							{!! Form::hidden('no_reg', $data_balita->no_reg) !!}
							{!! Form::hidden('nama_balita', $data_balita->nama_balita) !!}
							{!! Form::hidden('tgl_lahir', $data_balita->tgl_lahir) !!}
							{!! Form::hidden('tgl_periksa', $data_periksa['tgl_periksa']) !!}
							{!! Form::hidden('umur', $data_balita->umur) !!}
							{!! Form::hidden('berat_badan', $data_periksa['berat_badan']) !!}
							{!! Form::hidden('tinggi_badan', $data_periksa['tinggi_badan']) !!}
							{!! Form::hidden('zbbu', $data_periksa['zbbu']) !!}
							{!! Form::hidden('ztbu', $data_periksa['ztbu']) !!}
							{!! Form::hidden('zbbtb', $data_periksa['zbbtb']) !!}
							{!! Form::hidden('energi', $protein_energi['energi']) !!}
							{!! Form::hidden('protein', $protein_energi['protein']) !!}

							{!! Form::submit('Download PDF', ['class' => 'btn btn-danger']) !!}

							<a href="{{ route('tampilkan_semua_riwayat', $data_balita->id) }}" class="btn btn-success" style="color:white">Tampilkan semua riwayat</a>
							
							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Data Balita [ {{ $data_balita->nama_balita }} ]</h4>
							
							<div class="well well-trans">
							    <div class="wow fadeInRight" data-wow-delay="0.1s">

							    <p>
								    <ul class="lead-list">
								        <li>
								        	<span class="fa fa-lock fa-2x icon-success"></span> 
								        	<span class="list">
								        		<strong>ID / No. Registrasi Balita</strong><br /> {{ $data_balita->no_reg }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-user fa-2x icon-success"></span>
								        	<span class="list"><strong>Nama Balita</strong><br />
								        		{{ $data_balita->nama_balita }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-calendar fa-2x icon-success"></span>
								        	<span class="list"><strong>Tanggal Lahir</strong><br />
								        		{{ $data_balita->tgl_lahir }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-child fa-2x icon-success"></span>
								        	<span class="list"><strong>Jenis Kelamin</strong><br />
								        		
								        		@if($data_balita->jenis_kelamin == 'P')

								        			{{ "PEREMPUAN" }}

								        		@else

								        			{{ "LAKI-LAKI" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-wheelchair fa-2x icon-success"></span>
								        	<span class="list"><strong>Nama Ayah</strong><br />
								        		{{ $data_balita->nama_ayah }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-wheelchair fa-2x icon-success"></span>
								        	<span class="list"><strong>Nama Ibu</strong><br />
								        		{{ $data_balita->nama_ibu }}
								        	</span>
								        </li>
								        
								    </ul>
							    </p>

							    </div>
							</div> 
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-6">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box">
							
							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Riwayat Pemeriksaan Balita [ {{ $data_balita->nama_balita }} ]</h4> 
							
							<div class="well well-trans">
							    <div class="wow fadeInRight" data-wow-delay="0.1s">

							    <p>
								    <ul class="lead-list">
								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span> 
								        	<span class="list">
								        		<strong>Tanggal Periksa</strong><br /> {{ $data_periksa['tgl_periksa'] }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Umur</strong><br />
								        		{{ $data_balita->umur }} Bulan
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Berat Badan</strong><br />
								        		{{ $data_periksa['berat_badan'] }} Kg
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Tinggi Badan</strong><br />
								        		{{ $data_periksa['tinggi_badan'] }} cm
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>BB / U</strong><br />
								        		{{ $data_periksa['zbbu'] }} |

								        		@if($data_periksa['zbbu'] < -3)

								        		    {{ "Gizi Buruk" }}

								        		@elseif($data_periksa['zbbu'] >= -3 && $data_periksa['zbbu'] < -2)

								        		    {{ "Gizi Kurang" }}

								        		@elseif($data_periksa['zbbu'] >= -2 && $data_periksa['zbbu'] <= 2)

								        		    {{ "Gizi Baik" }}

								        		@elseif($data_periksa['zbbu'] > 2)

								        		    {{ "Gizi Lebih" }}

								        		@else

								        			{{ "Tidak ada hasil" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>TB / U</strong><br />
								        		{{ $data_periksa['ztbu'] }} |

								        		@if($data_periksa['ztbu'] < -3)

								        		    {{ "Sangat Pendek" }}

								        		@elseif($data_periksa['ztbu'] >= -3 && $data_periksa['ztbu'] < -2)

								        		    {{ "Pendek" }}

								        		@elseif($data_periksa['ztbu'] >= -2 && $data_periksa['ztbu'] <= 2)

								        		    {{ "Normal" }}

								        		@elseif($data_periksa['ztbu'] > 2)

								        		    {{ "Tinggi" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>BB / TB</strong><br />
								        		{{ $data_periksa['zbbtb'] }} |

								        		@if($data_periksa['zbbtb'] < -3)

								        		    {{ "Sangat Kurus" }}

								        		@elseif($data_periksa['zbbtb'] >= -3 && $data_periksa['zbbtb'] < -2)

								        		    {{ "Kurus" }}

								        		@elseif($data_periksa['zbbtb'] >= -2 && $data_periksa['zbbtb'] <= 2)

								        		    {{ "Normal" }}

								        		@elseif($data_periksa['zbbtb'] > 2)

								        		    {{ "Gemuk" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Kebutuhan Energi & Protein / hari </strong><br />
								        		{{ $protein_energi['energi'] }} Kkal |
								        		{{ $protein_energi['protein'] }} gr

								        	</span>
								        </li>
								        
								    </ul>
							    </p>

							    </div>
							</div> 
						</div>
					</div>
				</div>

			
			</div>
		</div>
		
	</section>

	@else

	<section id="intro" class="intro">
	    <div class="intro-content">
	        <div class="container" style="min-height:420px">
	            <div class="row">

	                <div class="col-lg-12">

	                     
	                    <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
	                        <h1 class="h-ultra">Oppsss... tidak ada hasil ditemukan</h1>
	                        <h2 class="h-ultra">Posyandu Melati</h2>
	                    </div>
	                    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
	                        <h4 class="h-light">Melayani Dengan Sepenuh<span style="color:red"> <i class="fa fa-heart"></i> </span></h4>
	                    </div>

	                    <div class="well well-trans">
	                        <div class="wow fadeInRight" data-wow-delay="0.1s">

	                        <ul class="lead-list">
	                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>404</strong><br />
	                            Tidak dapat ditemukan hasil dari data yang anda masukkan</span></li>
	                            
	                        </ul>

	                        </div>
	                    </div>       
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	@endif

@endsection