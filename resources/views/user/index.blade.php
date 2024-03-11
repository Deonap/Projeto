<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body>
    
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Utilizadores</h4>
                        <p class="text-muted m-b-30 font-14">Listagem de Utilizadores.</p>
                        <a href="#" class="btn btn-primary waves-effect waves-light m-b-20"><i
                                class="mdi mdi-plus"></i> Adicionar Utilizador</a>
                        <div id="datatable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable-1_filter" class="dataTables_filter">
                                        <label>
                                            Procurar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-1">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-1" class="table table-striped dt-responsive nowrap table-vertical dataTable no-footer dtr-inline space-y-5" width="100%" cellspacing="0" role="grid" aria-describedby="datatable-1_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-1" rowspan="1" colspan="1" style="width: 103px;" aria-sort="ascending" aria-label="Nome: activate to sort column descending">
                                                    Nome
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-1" rowspan="1" colspan="1" style="width: 144px;" aria-label="Email: activate to sort column ascending">
                                                    Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-1" rowspan="1" colspan="1" style="width: 63px;" aria-label="Status: activate to sort column ascending">
                                                    Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Tipo de Acesso: activate to sort column ascending">
                                                    Tipo de Acesso
                                                </th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 117px;" aria-label="">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $i => $user)
                                                <tr role="row" class="{{$i % 2 == 0 ? "bg-gray-300" : "bg-white"}} h-10">
                                                    <td class="text-center" tabindex="0" class="sorting_1">
                                                        {{$user->nome}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$user->email}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$user->status}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$user->funcoes}}
                                                    </td>
                                                    <td>
                                                        <a class="bg-gray-800 text-white" href="#">{{__('Editar')}}</a>
                                                        <a class="bg-red-800 text-white" href="#">{{__('Apagar')}}</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div><!-- end row -->
    </div><!-- container -->
</div>
</body>
</html>