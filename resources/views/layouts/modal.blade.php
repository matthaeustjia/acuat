<!-- Add Modal -->
<div class="modal fade" id="@yield('currentpage')AddModal" tabindex="-1" role="dialog" aria-labelledby="@yield('currentpage')AddModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="@yield('currentpage')AddModalLabel">Add @yield('currentpage')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/@yield('currentpage')/" method="POST">
        @csrf
        @yield('AddModalContent')
          <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="reset" class="btn btn-warning">Reset</button>
          </div>
      </form>   
    </div>
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="@yield('currentpage')EditModal" tabindex="-1" role="dialog" aria-labelledby="@yield('currentpage')EditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="@yield('currentpage')EditModalLabel">Edit @yield('currentpage')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" action="/@yield('currentpage')/" method="POST">
        @csrf
        @method('PATCH')
        @yield('EditModalContent')
          <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
          </div>
      </form>   
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="@yield('currentpage')DeleteModal" tabindex="-1" role="dialog" aria-labelledby="@yield('currentpage')DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="@yield('currentpage')DeleteModalLabel">Delete @yield('currentpage')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="deleteForm" action="/@yield('currentpage')/" method="POST">
          @csrf
          @method('DELETE')
          @yield('DeleteModalContent')
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>      
    </div>
  </div>
</div>