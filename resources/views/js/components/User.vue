<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                      <button class="btn btn-success" data-toggle="modal" data-target="#AddNew">
                            Add 
                            <i class="fas fa-user-plus fa-fw"></i>
                      </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Registered At</th>
                    <th>Modify</th>
                  </tr>
                  <tr v-for="user in users.data" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | upText}}</td>
                    <td>{{user.created_at | myDate}}</td>
                    <td>
                        <a href="#">
                            <i class="fa fa-edit blue">/</i>
                        </a>
                        <a href="#">
                            <i class="fa fa-trash red"></i>
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

                <!-- Modal -->
                <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="AddNewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddNewLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          <form @submit.prevent="createUsers">
                          <div class="modal-body">                          
                            <div class="form-group">
                              <input v-model="form.name" type="text" name="name"
                                placeholder="Name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                              <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                              <input v-model="form.email" type="email" name="email"
                                placeholder="Email"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                              <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                              <input v-model="form.password" type="password" name="password"
                                placeholder="Password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                              <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group">
                              <input v-model="form.bio" type="bio" name="bio"
                                placeholder="User Shot Bio(Optional)"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                              <has-error :form="form" field="bio"></has-error>
                            </div>                          
                            <div class="form-group">
                              <select v-model="form.type" type="type" name="type"                            
                                class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                  <option value="">Select Role</option>
                                  <option value="admin">Admin</option>
                                  <option value="user">User</option>
                                  <option value="author">Author</option>
                              <has-error :form="form" field="type"></has-error>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Create</button>
                          </div>
                       </form>
                  </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
          data() {
                return {
                  users: {},
                  form: new Form({
                      name: '',
                      email: '',
                      password: '',
                      type: '',
                      bio: '',
                      photo: ''
                  })
                }
          },
          
          methods: {
            loadUsers() {
            axios.get("api/user").then(({data}) => (this.users = data));
          },
              createUsers() {
                this.form.post('api/user');
              }
          },
        created() {
            this.loadUsers();
        }
    }
</script>
