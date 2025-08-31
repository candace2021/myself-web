<script setup></script>

<template>
  <section class="skills" id="skills">
    <h2 class="title">Technical skills</h2>
    <ul class="skillsItem">
      <li>
        <div class="icon">
          <img
            src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original-wordmark.svg"
          />
        </div>
        <div class="txt">
          <div class="m-title">HTML / CSS / SCSS</div>
          <ul class="list">
            <li>- 能獨立完成跨瀏覽器</li>
            <li>- 熟悉 Flexbox 排版</li>
            <li>- 能使用 SCSS 模組化管理樣式</li>
            <li>- 能製作 響應式版型 (手機/平板/桌機)</li>
          </ul>
        </div>
      </li>
      <li>
        <div class="icon">
          <img
            src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vuejs/vuejs-original-wordmark.svg"
          />
        </div>
        <div class="txt">
          <div class="m-title">Vue / Vite / Router / Pinia</div>
          <ul class="list">
            <li>- 開發單頁式應用(SPA)</li>
            <li>- 使用 Axios 進行 RESTful API 串接</li>
            <li>- 使用 Vue Router 進行動態路由設定</li>
            <li>- 透過 Pinia 管理全域狀態</li>
            <li>- 使用 Vite 進行開發與打包</li>
          </ul>
        </div>
      </li>
      <li>
        <div class="icon">
          <img
            src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-plain.svg"
          />
        </div>
        <div class="txt">
          <div class="m-title">JavaScript / jQuery</div>
          <ul class="list">
            <li>- 操作 DOM、事件綁定、Axios</li>
            <li>- 能撰寫模組化 JS 程式</li>
            <li>- 使用 JQ 處理專案互動效果</li>
          </ul>
        </div>
      </li>
      <li>
        <div class="icon">
          <img
            src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-plain.svg"
          />
        </div>
        <div class="txt">
          <div class="m-title">TypeScript</div>
          <ul class="list">
            <li>- 在 Vue 專案中撰寫型別註解</li>
            <li>- 使用 interface 進行程式結構設計</li>
            <li>- 提升程式碼可讀性與可維護性</li>
          </ul>
        </div>
      </li>
      <li>
        <div class="icon">
          <img
            src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/github/github-original-wordmark.svg"
          />
        </div>
        <div class="txt">
          <div class="m-title">Git / GitHub</div>
          <ul class="list">
            <li>- 熟悉 Git 基本指令，能有效管理專案版本</li>
            <li>- 善用分支 branch 與合併 merge 進行功能開發與版本維護</li>
          </ul>
        </div>
      </li>
      <li>
        <div class="icon">
          <img
            src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/photoshop/photoshop-plain.svg"
          />
        </div>
        <div class="txt">
          <div class="m-title">Photoshop / Figma / Illustrator</div>
          <ul class="list">
            <li>- 圖片裁切與壓縮，處理網頁素材</li>
            <li>- 觀看與匯出設計稿、標註尺寸</li>
            <li>- 調整簡單的 UI 版面</li>
          </ul>
        </div>
      </li>
    </ul>
  </section>
</template>

<style lang="scss" scoped>
@import '@/assets/scss/main.scss';
.skills {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 80%;
  margin: 0 auto;
  padding: 50px 0;
  @include mediaquery(null, 767px) {
    width: 88%;
  }
}
.skillsItem {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  > li {
    width: calc((100% - 60px) / 2);
    margin: 0 15px 50px;
    @include mediaquery(null, 991px) {
      display: flex;
      align-items: center;
      width: 100%;
      padding-bottom: 25px;
      margin: 0 0 25px;
      border-bottom: 1px solid #eee;
    }
    &:last-child {
      border-bottom: none;
    }
  }
  .icon {
    @include mediaquery(992px, null) {
      max-width: 160px;
      margin: 0 auto 10px;
    }
    @include mediaquery(768px, 991px) {
      width: 120px;
      flex: 0 0 120px;
      margin-right: 20px;
    }
    @include mediaquery(null, 767px) {
      width: 70px;
      flex: 0 0 70px;
      margin-right: 16px;
    }
    img {
      display: block;
      width: 100%;
    }
  }
  .m-title {
    font-size: 20px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 10px;
    @include mediaquery(null, 991px) {
      text-align: left;
      font-size: 18px;
    }
  }
  .list {
    max-width: 340px;
    text-align: center;
    margin: 0 auto;
    @include mediaquery(null, 991px) {
      text-align: left;
      max-width: 100%;
      font-size: 15px;
    }
  }
}
</style>
