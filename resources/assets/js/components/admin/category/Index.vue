<template>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Category
                <small>Here You can manage your category</small>
                <router-link :to="{ name: 'admin.user.create' }"><button class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Category</button></router-link>
                <button v-if="users.length > 0" class="btn btn-danger" @click="destroySubmit">
                    <i class="fa fa-trash"></i>Destroy</button>
            </h1>
            <ol class="breadcrumb">
                <li><a><i class="fa fa-dashboard"></i> Home</a></li>
                <li>
                    Category list
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">

                            <h3 class="box-title">Category Lists</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <alert :alert="alert"></alert>
                        <!--<alert v-bind:message="alert"></alert>-->

                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">


                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>Checked</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                </tr>
                                <tr v-for="user in users">
                                    <td><input type="checkbox" @click="user.completed = !user.completed"
                                               :value="user.id" v-model ="checkedNames" >
                                    </td>
                                    <td>{{ user.username }}</td>
                                    <td>{{ user.email }}</td>
                                    <td><span class="label label-success">Approved</span></td>
                                    <td><router-link class="btn btn-default" v-bind:to="user.id">View</router-link></td>
                                    <td><router-link class="btn btn-success" v-bind:to="user.id+ '/edit'">Edit</router-link></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
</template>
<script>

    export default{
        data(){
            return{
              users: [],
              alert: '',
              checkedNames: [],
              user: {
                completed: false,
              },
              filters: {
                  notDone: function(todo){
                      return todo.complete
                  },
                  completed: function(todo){
                      return todo.complete
                  },
              },
            }
        },
        computed: {
            finished: function(){
                return this.user.filter(this.filters.completed);
            },
            pending: function(){
            return this.user.filter(this.filters.notDone);
            },
        },
        created(){
            if(this.$route.query.alert){
                this.alert = this.$route.query.alert
                this.$broadcast('alert', this.alert);
            }
            this.fetchUsers();
        },
        methods:{
            fetchUsers(){
                this.$http.get('api/v1/user').then(response =>{
                    this.users = response.data.datas;
                })
            },


        }
    }
</script>

<!--destroySubmit: function(){
               this.users = this.users.filter(this.filters.notDone);
               this.$http.post('api/v1/user/', [id: this.checkedNames]).then(
               (response) => {

               },
               (response) => {

               });
           },
-->