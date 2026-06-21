<script setup></script>

<template>
  <section class="experience" id="experience">
    <h2 class="title">Experience</h2>
    <div class="expBox">
      <div class="box">
        <h3>32歲之前 - 大學畢業後的十年</h3>
        <p class="info">
          畢業於<span class="mark">台北實踐大學資管系</span
          >後，我的第一份工作是在公益團體擔任活動企劃，不僅負責活動規劃，也承擔多數核銷與文書行政相關工作。之後的工作內容大多也圍繞在文書處理上。儘管工作穩定，但薪資成長幅度有限，也逐漸感受不到成就感，讓我一直思考：「什麼樣的工作才真正適合我？」
        </p>
      </div>
      <div class="box">
        <h3>32歲之後 - 職涯的轉捩點</h3>
        <p class="info">
          一位全端工程師的朋友得知我的困惑後，建議我可以嘗試學習程式設計。畢竟我大學所學就是相關領域，或許能比較容易上手。也因此，我踏上了前端網頁工程師的職涯。
        </p>
        <p class="info">
          在一間接案公司擔任了兩年半的前端工程師，根據設計師提供的設計稿進行<span class="mark"
            >1:1的完美切版</span
          >，並加入<span class="mark">動態效果</span>，讓畫面更加生動。我也具備將<span class="mark"
            >追蹤碼整合</span
          >至 GTM 的經驗。不過，由於當時對未來有其他規劃，因此選擇離開公司。
        </p>
        <p class="info">
          離職後曾嘗試自行接案，雖然成功接到幾個一頁式網站的案子，但因為案源不穩定，無法長期發展。
        </p>
      </div>
      <div class="box">
        <h3>36歲 - 職涯方向逐漸明確</h3>
        <p class="info">
          在求職期間，由於原本的技術較為基礎，能拿到的 offer 並不多。於是我開始學習
          <span class="mark">Vue 框架</span>，才發現透過 Vue
          進行網站開發，不僅能提升效率，還能讓網站的結構與邏輯更清晰。這也讓我對前端開發產生了更多熱情與信心。
        </p>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.experience {
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
h3 {
  position: relative;
  font-size: 26px;
  font-weight: 500;
  margin-bottom: 6px;
  @include mediaquery(null, 767px) {
    font-size: 18px;
    font-weight: 700;
  }
  &::before {
    content: '';
    position: absolute;
    top: 0.5em;
    left: -9.8%;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #ffb300;
    @include mediaquery(null, 991px) {
      left: -9.2%;
    }
  }
}
.box {
  margin-bottom: 40px;
  margin-left: 10%;
}
.expBox {
  position: relative;
  width: 70%;
  margin: 0 auto;
  @include mediaquery(null, 991px) {
    width: 100%;
  }
  &::before {
    content: '';
    position: absolute;
    top: 1em;
    left: 0.75em;
    width: 2px;
    height: calc(100% - 1em);
    background: linear-gradient(to bottom, #eee 90%, #fff);
  }
}
.info {
  text-align: justify;
  line-height: 1.6;
  .mark {
    display: inline-block;
    padding: 0 4px;
    font-size: 18px;
    font-weight: 500;
    background-color: rgba(#ffd54f, 0.2);
    @include mediaquery(null, 767px) {
      font-size: 16px;
    }
  }
}
</style>
