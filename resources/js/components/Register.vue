<template>
<div>
    <div class="header">
        <div class="header-left">
            <div class="app-name">
                <a href="/">ApexLegendsReportJP</a>
            </div>
        </div>
        <div class="header-center">
            <div class="register-id register-info">
                <small class="register-title">ID</small><br>
                {{your_id}}
            </div>
            <div class="register-name register-info">
                <small class="register-title">名前</small><br>
                {{your_first_name}} {{your_last_name}}
            </div>
            <div class="register-email register-info">
                <small class="register-title">E-メール</small><br>
                {{your_email}}
            </div>
        </div>
        <div class="header-right">
            <div></div>
        </div>
    </div>
    <div class="contents">
        <div class="content">
            <div class="eye-catch">
            </div>
            <div class="nav report-nav">
                <router-link class="nav-link report-nav-el" to="/">チーターギャラリー</router-link>
                <router-link class="nav-link report-nav-el report-nav-el-active active" to="/register">登録</router-link>
            </div>
        </div>
        <div class="container">
            <div class="register-form">
                <!-- ID・Eメール -->
                <div class="form-group form-column">
                    <!-- ID -->
                    <div class="form-column-child-left">
                        <label for="your-id">ID <small class="optional-notice">[任意]</small></label>
                        <input v-model="your_id" class="form-control" id="your-id" aria-describedby="your-id-help">
                        <small id="your-id-help" class="form-text text-muted"></small>
                    </div>
                    <div class="form-column-child-center"></div>
                    <!-- Eメール -->
                    <div class="form-column-child-right">
                        <label for="your-email">メールアドレス</label>
                        <input v-model="your_email" type="email" class="form-control" id="your-email" aria-describedby="your-email-help">
                        <small id="your-email-help" class="form-text text-muted"></small>
                    </div>
                </div>
                <!-- 名前 -->
                <div class="form-group form-column">
                    <!-- Last Name -->
                    <div class="form-column-child-right">
                        <label for="your-last-name">性</label>
                        <input v-model="your_last_name" class="form-control" id="your-last-name" aria-describedby="your-last-name-help">
                        <small id="your-last-name-help" class="form-text text-muted"></small>
                    </div>
                    <div class="form-column-child-center"></div>
                    <!-- First Name -->
                    <div class="form-column-child-left">
                        <label for="your-first-name">名<small class="optional-notice">[任意]</small></label>
                        <input v-model="your_first_name" class="form-control" id="your-first-name" aria-describedby="your-first-name-help">
                        <small id="your-first-name-help" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-button">
                    <div>
                        <button v-on:click="register" class="btn btn-outline-primary form-button-submit">登録</button>
                    </div>
                    <div>
                        <button v-on:click="remove" class="btn btn-outline-danger form-button-remove">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div>
</div>
</template>

<script>
    export default {
        name: "Register",
        data: function() {
            return {
                your_id: "",
                your_email: "",
                your_first_name: "",
                your_last_name: "",
            }
        },
        localStorage: {
            register_id: {
                type: String,
            },
            register_first_name: {
                type: String
            },
            register_last_name: {
                type: String
            },
            register_email: {
                type: String
            },
        },
        methods: {
            register: function() {
                this.$localStorage.set('register_id', this.your_id);
                this.$localStorage.set('register_first_name', this.your_first_name);
                this.$localStorage.set('register_last_name', this.your_last_name);
                this.$localStorage.set('register_email', this.your_email);
                this.setYou();
            },
            setYou: function() {
                let tmp = this.$localStorage.get('register_id', null);
                if(tmp === null ||  tmp === 'undefined')
                    this.your_id = "";
                else
                    this.your_id = tmp;

                tmp = this.$localStorage.get('register_first_name', null);
                if(tmp === null ||  tmp === 'undefined')
                    this.your_first_name = "";
                else
                    this.your_first_name = tmp;

                tmp = this.$localStorage.get('register_last_name', null);
                if(tmp === null ||  tmp === 'undefined')
                    this.your_last_name = "";
                else
                    this.your_last_name = tmp;

                tmp = this.$localStorage.get('register_email', null);
                if(tmp === null ||  tmp === 'undefined')
                    this.your_email = "";
                else
                    this.your_email = tmp;
                console.log(tmp);
                console.log(typeof tmp)
            },
            remove: function() {
                this.$localStorage.remove('register_id');
                this.$localStorage.remove('register_first_name');
                this.$localStorage.remove('register_last_name');
                this.$localStorage.remove('register_email');
                this.your_id = "";
                this.your_first_name = "";
                this.your_last_name = "";
                this.your_email = "";
            }
        },
        mounted () {
            this.setYou();
        }
    }
</script>

<style>
    .header
    {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 50px;
        color: white;
        background: #191919;
        z-index: 100;
        display: flex;
        justify-content: center;
    }
    .header-left
    {
        width: 20%;
        display: flex;
        justify-content: flex-start;
    }
    .header-center
    {
        width: 60%;
        display: flex;
        justify-content: center;
    }
    .header-right
    {
        width: 20%;
        display: flex;
        justify-content: flex-end;
    }
    .contents
    {
        position: absolute;
        top: 50px;
        height: 1000px;
        width: 100%;
        flex: 1;
        bottom: 50px;
    }
    .footer
    {
        position: fixed;
        bottom: 0px;
        left: 0px;
        width: 100%;
        height: 25px;
        color: white;
        background: #191919;
        z-index: 100;
    }
    .app-name {
        margin: auto 10px;
    }
    .app-name a
    {
        font-weight: bold;
        color: white;
        text-decoration: none;
    }
    .content
    {
        width: 100%;
        background: #F9F9F9;
    }

    .eye-catch
    {
        width: 100%;
        height: 400px;
        background: #FFF url("../../../public/eye-catch-edit.jpg") no-repeat center top scroll;
    }
    .form-column
    {
        display: flex;
        justify-content: center;
    }
    .form-column-child-right
    {
        width: 45%;
    }
    .form-column-child-center
    {
        width: 10%;
    }
    .form-column-child-left
    {
        width: 45%;
    }
    #your-first-name, #your-last-name
    {
        display: inline;
    }
    .optional-notice
    {

    }
    .form-button-submit, .form-button-remove
    {
        box-sizing: border-box;
        padding: 10px 80px;
        margin: 20px 40px;
        font-weight: bold;
    }
    .form-button
    {
        margin-top: 10px;
        margin-bottom: 100px;
        display: flex;
        justify-content: center;
    }
    .report-nav
    {
        justify-content: center;
        background: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .report-nav-el
    {
        color: black;
        font-weight: bold;
        width: 250px;
    }
    .report-nav-el-active
    {
        color: #0257FF;
    }
    .register-info
    {
        text-align: center;
        padding: 0 10px;
    }
    .register-title
    {
        color: #A4A4A4;
    }
</style>
