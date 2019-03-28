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
                <router-link class="nav-link report-nav-el report-nav-el-active active" to="/">チーターギャラリー</router-link>
                <router-link class="nav-link report-nav-el" to="/register">登録</router-link>
            </div>
        </div>
        <div class="hacker-gallery-head">
            <strong>チーターギャラリー</strong>
            <p>報告された先輩たち</p>
        </div>
        <div class="">
            <div class="hacker-gallery-search">
                <b-form-input v-model="search" type="text" placeholder="Search" />
                <!-- <i class="material-icons">search</i> -->
            </div>
            <div class="hacker-gallery-body">
                <div v-b-modal.report-form class="card text-center hacker-gallery-body-card" v-for="(value) in hacker_players" v-on:click="getHackerIdFromCard(value)">
                    <div class="card-body">
                        <h5 class="card-title">{{value}}</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>
            <div>
            </div>
            <b-modal size="xl" id="report-form" class="report-form" v-bind:title="hacker_id" @ok="modalOk" @cancel="modalCancel" @shown="modalShown">
                <form>
                    <div class="hacker-modal">
                        <!-- Description Select -->
                        <div class="hacker-check-wrap">
                            <div class="form-check-wrap form-check" v-for="(value, key) in cheating">
                                <label class="form-check-label form-check-label-wrap user-select-none">
                                    <input class="form-check-input" type="checkbox" value="" v-bind:id="key">
                                    {{value}} ({{key}})
                                    <br>
                                    <small class="text-muted form-text">
                                        {{cheating_description[key]}}
                                    </small>
                                </label>
                            </div>
                        </div>
                        <div style="width: 5%"></div>
                        <!-- Description Text -->
                        <div class="form-group hacker-description-message-wrap">
                            <label for="hacker-description-message">
                                メッセージ　<small class="text-muted form-text">チート行為を選択すると自動的に入力されます</small>
                            </label>
                            <textarea v-model="hacker_message" class="form-control" id="hacker-description-message" :rows="hacker_message.split(/\n/).length"></textarea>
                        </div>
                    </div>
                </form>
            </b-modal>
        </div>
    </div>
    <div class="footer">
    </div>
</div>
</template>
<style src="./styles/Index.css"></style>
<script src="./scripts/Index.js"></script>
