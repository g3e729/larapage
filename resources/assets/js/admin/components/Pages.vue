<template>
  <div class="container-fluid p-0">
    <h1>
      <i class="fa fa-copy"></i>
      Pages
    </h1>

    <div class="content">

      <table class="table table-hover table-striped">
        <thead>
        <tr>
          <td width="25%">
            Parent
            <i class="fa fa-sort"></i>
          </td>
          <td width="25%">
            Title
            <i class="fa fa-sort"></i>
          </td>
          <td width="10%">
            Page Design
          </td>
          <td width="20%">
            Created At
          </td>
          <td width="20%">
            Actions
            <i class="fa fa-sort"></i>
          </td>
        </tr>
        </thead>

        <tbody v-if="items.length">
          <tr v-for="(item, index) in items">
            <td v-bind:class="{'text-muted': !item.parent_id}">{{ item.parent ? item.parent.title : '--' }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.page_file || 'Default' }}</td>
            <td>{{ item.created_at }}</td>
            <td>
              <button class="btn btn-primary" v-on:click="editPage(item, index)">
                <i class="fa fa-edit" title="Edit"></i>
              </button>
              <button class="btn btn-danger" v-on:click="deleteItem(item, true, index)">
                <i class="fa fa-trash" title="Delete"></i>
              </button>
            </td>
          </tr>
        </tbody>

        <tbody v-else>
          No Data
        </tbody>
      </table>
    </div>

    <!-- MODAL -->    
    <div class="modal fade editPage" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Page</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label for="formGroupExampleInput">Title</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter page title" v-model="edit.title">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea class="form-control" id="formGroupExampleInput2" placeholder="Type a description of this page" v-model="edit.description">
                </textarea>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Keywords</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Keywords">
                </textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-default" v-on:click="customPage(false)" data-dismiss="modal">Custom Page Design</button>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" v-on:click="updatePage">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL -->    
    <div class="modal fade deletePage" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete page "{{ edit.title }}"?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" v-on:click="deleteItem(edit)">Yes, delete this page</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL -->    
    <div class="modal fade customPage" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Custom Page Design</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div id="editor" style="height: 730px; width: 100%;"></div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" v-on:click="renderCustom">View</button>
            <button class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL -->    
    <div class="modal fade displayPage" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
          <div class="modal-body">
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  export default {
    data(){
      return {
        items: [],
        edit: {},
        editor: ''
      }
    },

    created: function()
    {
      this.fetchItems();
    },

    methods: {
      fetchItems() {
        let uri = '/api/v1/pages';
        this.axios.get(uri).then((response) => {
          this.items = response.data;
        });
      },
      deleteItem(item, show, index) {
        if (show) {
          this.edit = item;
          this.edit.index = index;
          $('.deletePage').modal('show');
        } else {
          let uri = `/api/v1/pages/${this.edit.id}`;
          this.items.splice(this.edit.index, 1);
          this.axios.delete(uri);
        }
      },
      updatePage() {
        let uri = `/api/v1/pages/${this.edit.id}`;
        this.axios.patch(uri, {
        data: this.edit
        }).then((response) => {
            if(response) {
              this.items[this.edit.index] = this.edit;
            }
        });
      },
      editPage(item, index) {
        this.edit = item;
        this.edit.index = index;
        $('.editPage').modal('show');
      },
      customPage(back) {
        if (!back) {
          this.editor = Kal.edit("editor");
          this.editor.setTheme("ace/theme/monokai");
          this.editor.session.setMode("ace/mode/html");
          this.editor.setValue(this.edit.title);
          this.editor.clearSelection();
        }

        $('.customPage').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });
      },
      renderCustom () {
        $('.customPage').modal('hide');

        var displayPage = $('.displayPage');

        displayPage.modal({
          show: true,
          backdrop: 'static',
        });

        displayPage.find('.modal-body').html(this.editor.getValue());
      }
    }
  }
</script>