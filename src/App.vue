<script setup>
import { ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()

const menu = ref(false)

const scrollTo = async (id) => {
  menu.value = false
  if (route.path !== '/') {
    await router.push('/')
  }
  const site = document.getElementById(id)
  if (!site) return
  window.scrollTo({
    top: site.getBoundingClientRect().top + window.scrollY,
    behavior: 'smooth',
  })
}

const menuActive = () => {
  menu.value = !menu.value
}
</script>

<template>
  <div :class="menu ? 'wrap menuOpen' : 'wrap'">
    <header>
      <div class="navigation">
        <div class="logo-name">
          <a href="/" @click.prevent="scrollTo('home')"><span>Candace</span></a>
        </div>
        <nav>
          <ul>
            <li class="menu-list">
              <a href="/" @click.prevent="scrollTo('home')"><span>Home</span></a>
            </li>
            <li class="menu-list">
              <a href="/" @click.prevent="scrollTo('introduction')"><span>Introduction</span></a>
            </li>
            <li class="menu-list">
              <a href="/" @click.prevent="scrollTo('experience')"><span>Work Experience</span></a>
            </li>
            <li class="menu-list">
              <a href="/" @click.prevent="scrollTo('skills')"><span>Technical Skills</span></a>
            </li>
            <li class="menu-list">
              <a href="/" @click.prevent="scrollTo('portfolio')"><span>Portfolio</span></a>
            </li>
            <li class="menu-list">
              <a href="/" @click.prevent="scrollTo('contact')"><span>Contact</span></a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="community">
        <div class="icon104">
          <a
            href="https://pda.104.com.tw/profile/share/a62MumUpUvuIVjzXxY3ux8gbHlokQNLa"
            target="_blank"
            ><img src="https://www.saswafer.com/wp-content/uploads/2019/04/104_logo.png" alt=""
          /></a>
        </div>
        <div class="cake">
          <a href="https://www.cake.me/s--d0AyhLqNGFZrYzVfBS1YYA--/candace-wu" target="_blank"
            ><img
              src="https://next-build-assets.cake.me/630407824ff1626e286866329cd4e797c3940f75/_next/static/media/cake.285942e1.svg"
              alt=""
          /></a>
        </div>
      </div>
      <a href="#" class="humber" @click.prevent="menuActive">
        <span></span><span></span><span></span>
      </a>
    </header>
    <RouterView />
  </div>
</template>

<style lang="scss">
@use '@/assets/scss/reset.scss';
main {
  margin-left: 285px;
  @include mediaquery(768px, 1200px) {
    margin-left: 245px;
  }
  @include mediaquery(null, 767px) {
    margin: 0;
  }
}
.wrap {
  position: relative;
  max-width: 100%;
  width: 1440px;
  margin: 0 auto;
  &.menuOpen header {
    @include mediaquery(null, 767px) {
      height: 100vh;
      transition: opacity 0.2s;
    }
    .navigation,
    .community {
      @include mediaquery(null, 767px) {
        opacity: 1;
        pointer-events: all;
      }
    }
    .humber {
      span {
        &:nth-child(1) {
          transform: rotate(45deg) translate(6px, 6px);
        }
        &:nth-child(2) {
          transform: translateX(-101%);
        }
        &:nth-child(3) {
          transform: rotate(-45deg) translate(5px, -5px);
        }
      }
    }
  }
}
header {
  position: fixed;
  top: 0;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 20px 40px;
  @include mediaquery(768px, null) {
    max-width: 285px;
  }
  @include mediaquery(768px, 1200px) {
    padding: 20px;
  }
  @include mediaquery(null, 767px) {
    z-index: 99;
    width: 100%;
    height: 60px;
    padding: 0;
    background-color: #fff;
  }
}
.navigation {
  display: inline-block;
  padding: 20px 0px;
  @include mediaquery(null, 767px) {
    padding: 40px 40px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.5s;
  }
}
.logo-name {
  font-size: 46px;
  font-family: 'Fascinate', system-ui;
  margin-bottom: 20px;
  color: $secondary-color;
  text-shadow: 1px 1px 1px $txt-color;
  @include mediaquery(null, 767px) {
    font-size: 32px;
    text-align: center;
  }
}
nav {
  .menu-list {
    position: relative;
    margin-bottom: 15px;
    a {
      position: relative;
      display: block;
      padding: 5px 0;
      overflow: hidden;
      font-size: 22px;
      font-weight: 600;
      color: $txt-color;
      @include mediaquery(null, 767px) {
        font-size: 18px;
        padding: 10px 0;
      }
      &:hover {
        &::after {
          transform: translateX(0%);
        }
      }
      &::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #eee;
      }
      &::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: $txt-color;
        transform: translateX(-101%);
        transition: transform 0.5s;
      }
    }
  }
}
.humber {
  display: none;
  position: fixed;
  top: 15px;
  right: 15px;
  width: 30px;
  height: 30px;
  overflow: hidden;
  @include mediaquery(null, 767px) {
    display: block;
  }
  span {
    position: absolute;
    display: inline-block;
    width: 100%;
    height: 2px;
    background-color: #212121;
    transition: transform 0.5s;
    &:nth-child(1) {
      top: 6px;
    }
    &:nth-child(2) {
      top: 50%;
      transform: translateY(-50%);
    }
    &:nth-child(3) {
      bottom: 6px;
    }
  }
}
.community {
  display: flex;
  @include mediaquery(null, 767px) {
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.5s;
    padding-bottom: 40px;
  }
  > div {
    a {
      display: block;
      width: 100%;
      height: 100%;
      img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: centere;
      }
    }
  }
  .icon104 {
    width: 36px;
    margin-right: 20px;
  }
  .cake {
    width: 80px;
  }
}
</style>
