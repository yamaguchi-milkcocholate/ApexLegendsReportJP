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
                <small class="register-title">メール</small><br>
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
                <router-link class="nav-link report-nav-el" to="/about">サイトについて</router-link>
            </div>
        </div>
        <div class="container">
            <div class="register-form">
                <!-- ID・Eメール -->
                <div class="form-group form-column">
                    <!-- ID -->
                    <div class="form-column-child-left">
                        <label for="your-id">ID</label>
                        <b-form-input
                            id="your-id"
                            class="form-control"
                            v-model="your_id"
                            trim
                            type="text"
                            :state="idState"
                            aria-describedby="your-id-feed-back your-id-help"
                            placeholder=""
                        />
                        <!-- This will only be shown if the preceeding input has an invalid state -->
                        <b-form-invalid-feedback id="your-id-feed-back">

                        </b-form-invalid-feedback>

                        <!-- This is a form text block (formerly known as help block) -->
                        <b-form-text id="your-id-help">任意</b-form-text>
                    </div>
                    <div class="form-column-child-center"></div>
                    <!-- Eメール -->
                    <div class="form-column-child-right">
                        <label for="your-email">メールアドレス</label>
                        <b-form-input
                            id="your-email"
                            class="form-control"
                            v-model="your_email"
                            trim
                            type="email"
                            :state="emailState"
                            aria-describedby="your-email-help your-email-feed-back"
                            placeholder="example@example.com"
                        />
                        <b-form-invalid-feedback id="your-email-feed-back">
                            必須項目
                        </b-form-invalid-feedback>
                        <b-form-text id="your-email-help"></b-form-text>
                    </div>
                </div>
                <!-- 名前 -->
                <div class="form-group form-column">
                    <!-- Last Name -->
                    <div class="form-column-child-right">
                        <label for="your-last-name">性</label>
                        <b-form-input
                            id="your-last-name"
                            class="form-control"
                            v-model="your_last_name"
                            trim
                            type="text"
                            :state="lastNameState"
                            aria-describedby="your-last-name-feed-back your-last-name-help"
                            placeholder=""
                        />
                        <b-form-invalid-feedback id="your-last-name-feed-back">
                        </b-form-invalid-feedback>

                        <b-form-text id="your-last-name-help">任意</b-form-text>
                    </div>
                    <div class="form-column-child-center"></div>
                    <!-- First Name -->
                    <div class="form-column-child-left">
                        <label for="your-first-name">名</label>
                        <b-form-input
                            id="your-first-name"
                            class="form-control"
                            v-model="your_first_name"
                            trim
                            type="text"
                            :state="firstNameState"
                            aria-describedby="your-first-name-feed-back your-first-name-help"
                            placeholder=""
                        />
                        <b-form-invalid-feedback id="your-first-name-feed-back">
                            必須項目
                        </b-form-invalid-feedback>

                        <b-form-text id="your-first-name-help"></b-form-text>
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
                <div class="container">
                    <div class="box26">
                        <span class="box-title">通知</span>
                        <p>登録された情報は、お使いのブラウザーにのみ保存されます。<br>削除ボタンから保存情報を削除できます</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div>
    <div class="alert-area">
        <b-alert
            class="alert-body"
            :show="dismissCountDown"
            dismissible
            :variant="alertType"
            @dismissed="dismissCountDown=0"
            @dismiss-count-down="countDownChanged"
        >
            <p>{{ alertMessage }}</p>
            <b-progress
                :variant="alertType"
                :max="dismissSecs"
                :value="dismissCountDown"
                height="4px"
            ></b-progress>
        </b-alert>
    </div>
</div>
</template>
<style src="./styles/Register.css"></style>
<script src="./scripts/Register.js"></script>
