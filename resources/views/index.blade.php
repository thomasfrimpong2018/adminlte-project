@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-11">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Recently Added Category</h3>

         
        </div>
        <!-- /.box-header -->
        <div class="box-body">

                
                        <div class='table table-responsive'>
                            <table class='table table no-margin table-hover' id='table'>
                                <tr>
                                <th >No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                
                                </tr>
                               
                               
                                @foreach($categories as $category)
                              <tr >
                                
                                <td> {{$category->title}}</td>
                                <td> {{$category->description}}</td>
                                <td> {{$category->created_at}}</td>
                                <td>
                                  <a class="show-modal btn btn-info  btn-sm" data-id={{$category->id}}  data-title={{$category->title}}  data-body={{$category->description}} >
                                  <i class="fa fa-eye"></i>
                               </a>
                                 <a class="edit-modal btn btn-warning  btn-sm" data-id={{$category->id}}  data-title={{$category->title}}  data-body={{$category->description}}  >
                                      <i class="glyphicon glyphicon-pencil"></i>
                                   </a>
                                   <a class="delete-modal btn btn-danger  btn-sm" data-id={{$category->id}}  data-title={{$category->title}}  data-body={{$category->description}}  >
                                          <i class="glyphicon glyphicon-trash"></i>
                                       </a>
                                </td>
                                </tr>
                      
                               @endforeach
                            </table>
                      
                        </div>
                      
                      </div>




          
       
        <!-- ./box-body -->
        <div class="box-footer">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Add New
              </button>
          </div>
        </div>
          <!-- /.row -->

         

          <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">New Category</h4>
                    </div>
                   <form action="category" method="POST">
                        {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="form-group">
                       <title for="title">Title</title>
                       <input name="title" id="title" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                            <title for="description">Description</title>
                            <textarea name="description" class="form-control" id="des" cols="20" rows="5">

                            </textarea>

                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->


@endsection