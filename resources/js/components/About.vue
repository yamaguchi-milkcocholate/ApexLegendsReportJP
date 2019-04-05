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
                <div class="eye-catch">
                </div>
                <div class="nav report-nav">
                    <router-link class="nav-link report-nav-el" to="/public">チーターギャラリー</router-link>
                    <router-link class="nav-link report-nav-el" to="/public/register">登録</router-link>
                    <router-link class="nav-link report-nav-el report-nav-el-active active" to="/public/about">サイトについて</router-link>
                </div>
            </div>
            <div class="container">
                <div class="box11">
                    <p>
                        このサイトは<a href="https://www.ea.com/ja-jp/games/apex-legends" target="_blank">Apex Legends</a>のチート報告を簡単に行い、他のプレイヤーにより報告されたチーターと疑われるプレイヤーを共有することを目的にしたものです。
                        <br><br>
                        報告されたプレイヤーは、すぐさま<a href="https://www.easy.ac/ja/" target="_blank">Easy Anti-Cheat</a>に報告されます。
                        <br><br>
                        ご協力に感謝いたします。
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./scripts/About.js"></script>
<style src="./styles/About.css"></style>
