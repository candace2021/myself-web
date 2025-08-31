<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/pagination'
import { ref } from 'vue'
import { RouterLink } from 'vue-router'
import getWorks from '@/composibles/getWorks'

const modules = [Pagination]
const swiperOptions = ref({
  slidesPerView: 2,
  spaceBetween: 10,
  pagination: {
    el: '.custom-pagination',
    clickable: true,
  },
  breakpoints: {
    992: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
})

const { works, apiURL } = getWorks()

apiURL()
</script>

<template>
  <section class="portfolio" id="portfolio">
    <h2 class="title">Portfolio</h2>
    <p class="info">
      收錄部分歷年的網站作品，
      <br />包含學習 Vue 過程中的實作專案， <br />持續累積前端技術與開發實力。
    </p>
    <div class="btn">
      <RouterLink to="/portfolioList">More works</RouterLink>
    </div>
    <div class="swiepr-container">
      <swiper v-bind="swiperOptions" :modules="modules" class="mySwiper">
        <template v-for="work in works" :key="work.id">
          <swiper-slide v-if="work.chosen">
            <RouterLink :to="{ name: 'portfolioDetail', params: { id: work.id } }">
              <div class="img">
                <img :src="work.img" :alt="work.title" />
              </div>
              <div class="txt">{{ work.type }} | {{ work.title }}</div>
              <ul class="tags">
                <li v-for="tag in work.tags" :key="tag">{{ tag }}</li>
              </ul>
            </RouterLink>
          </swiper-slide>
        </template>
      </swiper>
      <div class="custom-pagination"></div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
@import '@/assets/scss/main.scss';
.portfolio {
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
.info {
  margin-bottom: 20px;
  text-align: center;
}
.btn {
  margin-bottom: 16px;
  text-align: right;
  margin-left: auto;
  a {
    display: inline-block;
    padding: 2px 4px;
    font-size: 18px;
    font-weight: 600;
    color: #212121;
    border-bottom: 1px solid#eee;
    @include mediaquery(null, 767px) {
      font-size: 16px;
    }
  }
}
.swiepr-container {
  width: 100%;

  .img {
    width: 100%;
    aspect-ratio: 1 / 1;
    border: 1px solid #ddd;
    margin-bottom: 16px;
    img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top left;
    }
  }
}
.custom-pagination {
  margin-top: 45px;
  display: flex;
  justify-content: center;
  gap: 8px;
  &::v-deep(.swiper-pagination-bullet) {
    width: 10px;
    height: 10px;
    background: #212121;
    border-radius: 50%;
    transition: all 0.3s;
    opacity: 0.1;
    &.swiper-pagination-bullet-active {
      background: #212121;
      opacity: 1;
    }
  }
}
.txt {
  font-size: 18px;
  margin-bottom: 10px;
  @include mediaquery(null, 767px) {
    font-size: 16px;
  }
}
.tags {
  display: flex;
  flex-wrap: wrap;
  li {
    padding: 2px 6px;
    border-radius: 4px;
    background-color: rgba(#ffd54f, 0.5);
    color: #212121;
    margin: 0 3px 3px 0;
    font-size: 14px;
    @include mediaquery(null, 767px) {
      font-size: 13px;
    }
  }
}
</style>
