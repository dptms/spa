<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">登录</div>

                    <div class="panel-body">
                        <form class="form-horizontal" v-on:submit.prevent="onSubmit">

                            <div class="form-group" :class="{'has-error':errors.has('email')}">
                                <label for="email" class="col-md-4 control-label">邮箱</label>

                                <div class="col-md-6">
                                    <input id="email"
                                           v-validate data-vv-rules="required|email" data-vv-as="邮箱"
                                           type="email" class="form-control" name="email" value="" required
                                           v-model="email">
                                    <span v-show="errors.has('email')"
                                          class="help-block">{{errors.first('email')}}</span>
                                </div>
                            </div>

                            <div class="form-group" :class="{'has-error':errors.has('password')}">
                                <label for="password" class="col-md-4 control-label">密码</label>

                                <div class="col-md-6">
                                    <input id="password"
                                           v-validate data-vv-rules="required|min:6" data-vv-as="密码"
                                           type="password" class="form-control" name="password" required
                                           v-model="password">
                                    <span v-show="errors.has('password')" class="help-block">{{errors.first('password')}}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        登录
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JWT_TOKEN from '../../helper/jwt';

    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                passwordConfirmation: ''
            }
        },
        methods: {
            onSubmit() {
                this.$validator.validateAll().then((reslut) => {
                    if (reslut) {
                        let postData = {
                            email: this.email,
                            password: this.password,
                        };
                        this.$store.dispatch('loginRequest', postData).then(() => {
                            this.$router.push({name: 'users.show'});
                        }).catch(error => {
                            console.log(error);
                        });
                    }
                });
            }
        }
    }
</script>