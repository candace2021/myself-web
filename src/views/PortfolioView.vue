<script setup>
import { ref } from 'vue'
import getWorks from '@/composibles/getWorks'

const filterStatus = ref('all')
const { works, protfolio, apiURL } = getWorks()

apiURL()

const isOpen = (item) => {
  filterStatus.value = item
  if (item == 'all') return (works.value = protfolio.value)
  works.value = protfolio.value.filter((list) => list.type == item)
}
</script>

<template>
  <main>
    <div class="portfolioList">
      <h2 class="title">Portfolio</h2>
      <p class="info">
        收錄部分歷年的網站作品，
        <br />包含學習 Vue 過程中的實作專案， <br />持續累積前端技術與開發實力。
      </p>
      <div class="proftfolio">
        <div class="topMeun">
          <a href="#" :class="{ active: filterStatus === 'all' }" @click.prevent="isOpen('all')"
            >全部</a
          >
          <a href="#" :class="{ active: filterStatus === '官網' }" @click.prevent="isOpen('官網')"
            >官網</a
          >
          <a
            href="#"
            :class="{ active: filterStatus === '一頁式' }"
            @click.prevent="isOpen('一頁式')"
            >一頁式</a
          >
          <a href="#" :class="{ active: filterStatus === 'Vue' }" @click.prevent="isOpen('Vue')"
            >Vue</a
          >
        </div>
        <div class="listItem">
          <div class="list" v-for="work in works" :key="work.id">
            <RouterLink :to="{ name: 'portfolioDetail', params: { id: work.id } }">
              <div class="img">
                <img :src="work.img" :alt="work.title" />
              </div>
              <div class="txt">{{ work.type }} | {{ work.title }}</div>

              <ul class="tags">
                <li v-for="tag in work.tags" :key="tag">{{ tag }}</li>
              </ul>
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
.portfolioList {
  padding: 50px 0;
  max-width: 90%;
  margin: 0 auto;
}
.info {
  margin-bottom: 50px;
  text-align: center;
  @include mediaquery(null, 991px) {
    margin-bottom: 30px;
  }
}
.proftfolio {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px #ccc;

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
.topMeun {
  display: flex;
  align-items: center;
  justify-content: center;
  border-bottom: 1px solid #ccc;
  a {
    flex: 0 0 calc(100% / 4);
    text-align: center;
    padding: 20px 0 10px;
    &.active {
      border-bottom: 2px solid #212121;
    }
  }
}
.listItem {
  display: flex;
  flex-wrap: wrap;
  padding: 50px 30px 30px;
  @include mediaquery(null, 767px) {
    padding: 30px 20px 20px;
  }
  .list {
    width: calc((100% - 40px) / 3);
    margin: 0 20px 42px 0;
    @include mediaquery(null, 991px) {
      width: calc((100% - 10px) / 2);
      margin: 0 10px 30px 0;
    }
    &:nth-child(2n) {
      @include mediaquery(null, 991px) {
        margin-right: 0;
      }
    }
    &:nth-child(3n) {
      @include mediaquery(992px, null) {
        margin-right: 0;
      }
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
