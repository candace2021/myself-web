<script setup>
import getWork from '@/composibles/getWork'
import { useRouter } from 'vue-router'

const router = useRouter()

const id = defineProps({
  id: String,
})

const { work, apiURL } = getWork(id.id)

apiURL()

const goBack = () => {
  router.go(-1)
}
</script>

<template>
  <main>
    <div class="portfolioDetail">
      <h1 class="title">{{ work.title }}</h1>
      <p class="info" v-html="work.description"></p>
      <div class="btn" v-if="work.github || work.web">
        <a :href="work.github" target="_blank" v-if="work.github"> Github原始碼 </a>
        <a :href="work.web" target="_blank" v-if="work.web"> 網站連結 </a>
      </div>
      <div class="img">
        <img :src="work.img" :alt="work.title" />
      </div>
      <div class="back btn">
        <a href="#" @click.prevent="goBack">返回</a>
      </div>
    </div>
  </main>
</template>

<style scoped lang="scss">
@import '@/assets/scss/main.scss';
.portfolioDetail {
  padding: 50px 0;
  max-width: 90%;
  margin: 0 auto;
  @include mediaquery(null, 767px) {
    padding-top: 60px;
  }
  .img {
    text-align: center;
  }
}
h1.title {
  text-align: center;
  font-size: 42px;
  font-weight: 600;
  margin-bottom: 20px;
  @include mediaquery(768px, 991px) {
    font-size: 34px;
  }
  @include mediaquery(null, 767px) {
    font-size: 28px;
  }
}
.info {
  margin-bottom: 50px;
  text-align: center;
  @include mediaquery(null, 991px) {
    margin-bottom: 30px;
  }
}
.btn {
  text-align: center;
  margin-bottom: 20px;
  a {
    padding: 8px 10px;
    margin: 0 10px;
    border: 1px solid #212121;
    border-radius: 5px;
  }
}
.back {
  margin: 100px 0 50px;
  @include mediaquery(null, 767px) {
    margin: 60px 0 30px;
  }
  a {
    padding: 10px 20px;
  }
}
</style>
