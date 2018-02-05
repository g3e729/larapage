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
          <td>
            Parent
            <i class="fa fa-sort"></i>
          </td>
          <td>
            Title
            <i class="fa fa-sort"></i>
          </td>
          <td>
            Customized Page
          </td>
          <td>
            Actions
            <i class="fa fa-sort"></i>
          </td>
        </tr>
        </thead>

        <tbody>
          <tr v-for="(item, index) in items">
            <td v-bind:class="{'text-muted': !item.parent_id}">{{ item.parent_id || '--' }}</td>
            <td>{{ item.title }}</td>
            <td><i class="fa" v-bind:class="{'fa-check': item.page_file, 'fa-times': !item.page_file}"></i></td>
            <td>
              <button class="btn btn-primary">
                <i class="fa fa-edit" title="Edit" data-toggle="modal" data-target="#myModal" v-on:click="edit = item; edit.index = index"></i>
              </button>
              <button class="btn btn-danger" v-on:click="deleteItem(item.id)">
                <i class="fa fa-trash" title="Delete"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- MODAL -->    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <label for="formGroupExampleInput2">Custom Page Design</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter the custom blade file" v-model="edit.page_file">
                </textarea>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" v-on:click="updatePage">Save changes</button>
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
        edit: {}
      }
    },

    created: function()
    {
      this.fetchItems();
    },

    methods: {
      fetchItems()
      {
        let uri = '/api/v1/pages';
        this.axios.get(uri).then((response) => {
            this.items = response.data;
        });
      },
      deleteItem(id)
      {
        let uri = `/api/v1/pages/${id}`;
        this.items.splice(id, 1);
        this.axios.delete(uri);
      },
      updatePage()
      {
        let uri = `/api/v1/pages/${this.edit.id}`;
        this.axios.patch(uri, {
          data: this.edit
        }).then((response) => {
            if(response) {
              this.items[this.edit.index] = this.edit;
            }
        });
      }
    }
  }
</script>