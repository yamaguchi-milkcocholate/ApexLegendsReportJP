<template>
<div>
    <div class="header">
        <div class="header-left">
            <div class="app-name">
                <a href="/public">ApexLegendsReportJP</a>
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
            <div class="eye-catch"
                 style="background: #FFF url('public/images/eye-catch-edit.jpg') no-repeat center top scroll;"
            >
            </div>
            <div class="nav report-nav">
                <router-link class="nav-link report-nav-el report-nav-el-active active" to="/public">チーターギャラリー</router-link>
                <router-link class="nav-link report-nav-el" to="/public/register">登録</router-link>
                <router-link class="nav-link report-nav-el" to="/public/about">サイトについて</router-link>
            </div>
        </div>
        <div class="hacker-gallery-head">
            <strong>チーターギャラリー</strong>
            <p>報告された先輩たち</p>
        </div>
        <div class="">
            <div class="hacker-gallery-top">
                <div class="hacker-gallery-self">
                    <b-button v-b-modal.report-form variant="warning">新しくチーターを報告</b-button>
                    <b-button v-bind:disabled="updateDisabled" v-on:click="initHackers">データを更新</b-button>
                </div>
                <div class="hacker-gallery-search">
                    <b-form-input v-model="search" type="text" placeholder="Search"/>
                </div>
            </div>
            <div class="hacker-gallery-body">
                <div v-b-modal.report-form
                     class="card text-center hacker-gallery-body-card"
                     v-for="(value) in selected_hacker_players"
                     v-on:click="getHackerIdFromCard(value.hacker_id )"
                >
                    <div class="card-body">
                        <h5 class="card-title">{{value.hacker_id}}</h5>
                        <p class="card-text">count: {{ value.count }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{ value.last }}
                    </div>
                </div>
            </div>
            <div>
            </div>
            <b-modal size="xl" id="report-form" class="report-form" v-bind:title="hacker_id" @ok="modalOk" @shown="modalShown">
                <form>
                    <div class="hacker-modal">
                        <!-- Description Select -->
                        <div class="hacker-check-wrap">
                            <b-form-group>
                                <b-form-invalid-feedback :state="selectCheckBox">ひとつ以上選択してください</b-form-invalid-feedback>
                                <b-form-valid-feedback :state="selectCheckBox">Thank you!!</b-form-valid-feedback>
                                <b-form-checkbox
                                    class="form-check-wrap form-check"
                                    v-for="item in cheating"
                                    v-model="hacker_check"
                                    :key="item.key"
                                    :value="item.key"
                                    :state="selectCheckBox"
                                >
                                    {{item.value}} <br>
                                    <small class="text-muted form-text">
                                    {{item.text}}
                                    </small>
                                </b-form-checkbox>
                            </b-form-group>
                        </div>
                        <div style="width: 5%; border-left: 1px solid rgba(0, 0, 0, 0.1)"></div>
                        <!-- Description Text -->
                        <div class="form-group hacker-description-message-wrap">
                            <b-form-input
                                id="hacker-id-input"
                                v-model="hacker_id"
                                type="text"
                                required
                                placeholder="チーターのID"
                            ></b-form-input>
                            <label class="font-alphabet">
                                Message　<small class="text-muted form-text">チート行為を選択すると自動的に入力されます</small>
                            </label>
                            <div class="box17">
                                <p class="kaigyo font-alphabet">{{ hacker_message }}</p>
                            </div>
                            <label for="your-message" class="font-alphabet">
                                自由記入　<small class="text-muted form-text"></small>
                            </label>
                            <textarea v-model="your_message" class="form-control" id="your-message" :rows="your_message.split(/\n/).length"></textarea>
                        </div>
                    </div>
                </form>
            </b-modal>
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
<style src="./styles/Index.css"></style>
<script src="./scripts/Index.js"></script>
