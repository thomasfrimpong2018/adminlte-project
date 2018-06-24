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

                
                        
                            <table class='table table-responsive no-margin table-hover' id='table'>
                                <tr>
                                
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Edit/Delete</th>
                                </tr>
                               
                               
                                @foreach($categories as $category)
                              <tr >
                                
                                <td> {{$category->title}}</td>
                                <td> {{$category->description}}</td>
                                <td> {{$category->created_at}}</td>
                                <td>
                                  
                                 <a class="edit-modal btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit" data-id="{{$category->id}}"  data-title="{{$category->title}}"  data-description="{{$category->description}}"  >
                                      <i class="fa fa-pencil"></i>
                                   </a>
                                   <a class="delete-modal btn btn-danger  btn-sm" data-toggle="modal" data-target="#modal-delete" data-id="{{$category->id}}"  data-title="{{$category->title}}"  data-description="{{$category->description}}"  >
                                          <i class="fa fa-trash"></i>
                                       </a>
                                </td>
                                </tr>
                      
                               @endforeach
                            </table>
                      
                        
                      
                      </div>




          
       
        <!-- ./box-body -->
        <div class="box-footer">
          <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-add">
                Add New
              </button>
          </div>
        </div>
          <!-- /.row -->

         <!---Insert Modal-->

          <div class="modal fade" id="modal-add"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

               <!---Update Modal-->

          <div class="modal modal-primary fade" id="modal-edit"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Category</h4>
                </div>
              <form action="{{ route('category.update','category') }}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('patch')}}
                <div class="modal-body">
                  <div class="form-group">
                   <title for="title">Title</title>
                   <input name="title" id="title" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                        <title for="description">Description</title>
                        <textarea name="description" class="form-control" id="description" cols="20" rows="5">

                        </textarea>
                        <input name="id"  type="hidden" id="id">
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

   <!---Delete Modal-->

   <div class="modal modal-danger fade" id="modal-delete"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Delete Category</h4>
          </div>
        <form action="{{ route('category.destroy','category') }}" method="POST">
              {{ csrf_field() }}
              {{method_field('delete')}}
          <div class="modal-body">
            <input name="id"  type="hidden" id="id">
            Are you sure you want to delete this category?

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete Category</button>
          </div>
      </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


@endsection