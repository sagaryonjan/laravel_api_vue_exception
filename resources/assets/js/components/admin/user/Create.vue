<template>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                User
                <small>Here You can manage your user</small>
                <button class="btn btn-primary"><i class="fa fa-plus"></i>
                    <router-link :to="{ name: 'admin.user.index' }">User List</router-link></button>
            </h1>
            <ol class="breadcrumb">
                <li><a><i class="fa fa-dashboard"></i> Home</a></li>
                <li>
                    User Add
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Horizontal Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                            <form @submit.prevent="submitForm" class="form-horizontal" method="post"
                                  enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="password"
                                               placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Sign in</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
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
              alert:''
            }
        },
        created(){

        },
        methods: {
            //while submiting form
            submitForm: function(){
                var form = document.querySelector('form');
                var formdata = new FormData(form);
                this.$http.post('api/v1/user', formdata).then(
                (response)=>
                {
                   this.$router.push( { path:'/admin/user/index',   query: { alert: 'Created Succesfully' } })
                },
                (response) =>
                {

                });

            }

        }
    }
</script>

