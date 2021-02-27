@extends('layouts.appDashboard')

@section('styles')

@endsection

@section('openModPayment')
    open
@endsection

@section('activeListPayment')
    active
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li class="active">Mantenedor de Pagos</li>
        </ul>
        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div>
    </div>
@endsection

@section('content')
    <a id="newPayment" class="btn btn-success">
        <i class="icon-2x fa fa-plus"></i> Nuevo metodo de Pago
    </a>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">metodo</th>
            <th scope="col">Imagen</th>
            <th scope="col">Tienda</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $metodos as $metod )
        <tr>
            <th scope="row">{{ $metod->id }}</th>
            <td>{{ $metod->name }}</td>
            <td>
                @if($metod->image)
                    <img src="{{ asset('images/category/'.$metod->image) }}" alt="{{ $metod->name }}" width="100px" height="100px">
                @else
                    <img src="{{ asset('images/no_image.jpg') }}" alt="No image" width="100px" height="100px">
                @endif
            </td>
            <td></td>
            <td>

              <!--  <a data-edit="{{ $metod->id }}" data-shop="{{ $metod->shop_id }}" data-image="{{ $category->image }}" data-description="{{ $category->description }}" data-name="{{ $category->name }}"  class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                <a data-delete="{{ $metod->id }}" data-shop="{{ $metod->shop->name }}" data-image="{{ $category->image }}" data-description="{{ $category->description }}" data-name="{{ $category->name }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>-->

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div id="modalCreate" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Nuevo Metodo de Pago</h4>
                </div>
                <form id="formCreate" class="form-horizontal" data-url="{{ route('payment.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="name"> Categoría </label>

                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="col-xs-10 col-sm-10" placeholder="Ejm: Laptops" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="image"> Imagen </label>

                            <div class="col-sm-9">
                                <input type="file" id="image" name="image" class="col-xs-10 col-sm-10" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="shop"> Tienda </label>

                            <div class="col-sm-9">
                                <select name="shop" id="shop" class="select2 col-xs-10 col-sm-10" multiple="multiple">
                                    @foreach( $shops as $shop )
                                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEdit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modificar Metodo de Pago</h4>
                </div>
                <form id="formEdit" class="form-horizontal" data-url="{{ route('payment.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="payment_id" id="payment_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="nameE"> Metodo de pago </label>

                            <div class="col-sm-9">
                                <input type="text" id="nameE" name="name" class="col-xs-10 col-sm-10" placeholder="Ejm: PayPal" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="imageE"> Imagen </label>

                            <div class="col-sm-9">
                                <input type="file" id="imageE" name="image" class="col-xs-10 col-sm-10" />
                                <img src="" id="image-preview" width="100px" height="100px" alt="Imagen previsualizacion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="shopE"> Tienda </label>

                            <div class="col-sm-9">
                                <select name="shop" id="shopE" class="col-xs-10 col-sm-10 select2 multiple">
                                    @foreach( $shops as $shop )
                                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div id="modalDelete" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmar eliminación</h4>
                </div>
                <form id="formDelete" data-url="{{ route('payment.destroy') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="payment_id" name="payment_id">
                        <p id="nameDelete"></p>
                        <p id="shopDelete"></p>
                        <img src="" id="imageDelete" alt="Imagen Preview" width="100px" height="100px" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/methodPayments/index.js') }}"></script>
@endsection