<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import { ref } from 'vue'

const modules = [Navigation]
const activeIndex = ref(0)

const onSlideChange = (swiper) => {
  activeIndex.value = swiper.activeIndex
  document.getElementById('tree').style.transform = `translateX(-${25 * activeIndex.value}%)`
}
</script>

<template>
  <section class="introduction" id="introduction">
    <div class="self-intro">
      <h2 class="title">Self-Introduction</h2>
      <div class="content">
        <div class="info">
          <p>
            我是一位擁有<span class="mark">兩年半</span>前端切版經驗的網頁開發者，擅長使用 HTML、CSS
            與 Vue 框架製作<span class="mark">響應式網站</span>。
          </p>
          <p>我注重細節與使用者體驗，喜歡把設計完美呈現並確保網頁效能。</p>
          <p>
            目前正在積極提升<span class="mark">JavaScript</span>及<span class="mark">Vue</span
            >能力，期望能找到一份前端工程師職位，與團隊共同打造優質的網站產品。
          </p>
        </div>
        <div class="imgBox">
          <img src="@/assets/images/img-2.jpg" alt="" />
        </div>
      </div>
    </div>
    <div class="work-plan">
      <h2 class="title">Work Plan</h2>
      <div class="content">
        <div class="imgBox">
          <div class="img">
            <img id="tree" src="@/assets/images/tree.jpg" alt="" />
          </div>
        </div>
        <div class="info">
          <div class="swiperBox">
            <div class="btn">
              <button class="custom-prev">←</button>
              <button class="custom-next">→</button>
            </div>
            <swiper
              :navigation="{
                nextEl: '.custom-next',
                prevEl: '.custom-prev',
              }"
              :modules="modules"
              class="intro-swiper"
              @slideChange="onSlideChange"
            >
              <swiper-slide>
                <h3>0-2年｜打底期（打基礎、學習）</h3>
                <p>
                  從零開始學習技術，將不熟悉的工具與流程一一摸索，穩扎穩打建立起前端開發的核心基礎。
                </p>
              </swiper-slide>
              <swiper-slide>
                <h3>2-4年｜茁壯期（快速成長）</h3>
                <p>
                  善用下班與週末時間自學，涉獵更多產業趨勢與進階技術，不斷拓展視野，提升解決問題的能力。
                </p>
              </swiper-slide>
              <swiper-slide>
                <h3>5-6年｜穩定期（技術與風格穩定）</h3>
                <p>
                  開發節奏趨於成熟，技術與美感日漸穩定，開始涉獵如手機 App
                  或互動動態等延伸領域，嘗試更多挑戰。
                </p>
              </swiper-slide>
              <swiper-slide>
                <h3>7-8年｜開展期（多元領域）</h3>
                <p>累積了紮實經驗後，邁向跨領域發展，探索全端技術，開啟更多可能性與創造力。</p>
              </swiper-slide>
            </swiper>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
@import '@/assets/scss/main.scss';
.introduction {
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
.content {
  display: flex;
  align-items: center;
  justify-content: center;
  @include mediaquery(null, 991px) {
    flex-direction: column;
    justify-content: center;
  }
}
.self-intro {
  margin-bottom: 60px;
  .imgBox {
    @include mediaquery(992px, null) {
      flex: 0 0 55%;
      margin-left: 5%;
    }
    @include mediaquery(null, 991px) {
      margin-top: 20px;
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
    p {
      margin-bottom: 10px;
    }
  }
}
.work-plan {
  width: 80%;
  @include mediaquery(null, 991px) {
    width: 100%;
  }
  .imgBox {
    flex: 0 0 35%;
    margin-right: 5%;
    max-width: 250px;
    aspect-ratio: 1 / 1.248;
    overflow: hidden;
    @include mediaquery(768px, 991px) {
      max-width: 200px;
    }
    @include mediaquery(null, 767px) {
      max-width: 160px;
    }
    .img {
      width: 400%;
    }
    img {
      object-position: left top;
    }
  }
  .info {
    width: 100%;
    @include mediaquery(992px, null) {
      flex: 0 0 60%;
      width: 60%;
    }
  }
  .swiperBox {
    width: 100%;
  }
  h3 {
    font-size: 26px;
    font-weight: 500;
    margin-bottom: 12px;
    @include mediaquery(null, 767px) {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 6px;
    }
  }
  p {
    line-height: 1.6;
    text-align: justify;
  }
  .btn {
    text-align: right;
    margin-bottom: 32px;
    button:not(.swiper-button-disabled) {
      cursor: pointer;
    }
    button {
      border-radius: 50%;
      width: 36px;
      height: 36px;
      border: 1px solid #ffd54f;
      background: rgba(#ffd54f, 0.7);
      color: #212121;
    }
    .custom-prev {
      margin-right: 10px;
    }
    .swiper-button-disabled {
      opacity: 0.5;
    }
  }
}
</style>
