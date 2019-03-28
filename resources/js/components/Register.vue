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
<style src="./styles/Register.css"></style>
<script src="./scripts/Register.js"></script>
