<script setup>
const isActive = (e) => {
  const parentEl = e.currentTarget.parentElement
  const parentSiblingsEl = Array.from(parentEl.parentElement.children).filter(
    (el) => el !== parentEl,
  )
  parentEl.classList.toggle('active')
  parentSiblingsEl.forEach((el) => el.classList.remove('active'))
}

import { reactive, ref } from 'vue'
import emailjs from 'emailjs-com'

const form = reactive({
  name: '',
  email: '',
  phone: '',
  message: '',
})

const status = ref('')

const sendEmail = async () => {
  try {
    await emailjs.send(
      'service_3pkclru', // ← 換成 EmailJS 給你的 Service ID
      'template_zp9bglh', // ← 換成 Template ID
      form,
      'KFjuqUdvFq5Y9OfWf', // ← 換成 Public Key
    )
    status.value = '✅ 已成功送出！我會盡快回覆你。'
    form.name = ''
    form.email = ''
    form.phone = ''
    form.message = ''
  } catch (error) {
    console.error('EmailJS 發送錯誤：', error)
    status.value = '❌ 發送失敗，請稍後再試。'
  }
}
</script>

<template>
  <section class="contact" id="contact">
    <h2 class="title">Contact</h2>
    <div class="content">
      <div class="qaItem">
        <h3>Asked Questions</h3>
        <div class="item">
          <div class="list">
            <a href="" class="q_title" @click.prevent="isActive"
              >你從文書轉職為前端工程師的契機是什麼？為什麼想繼續走這條路？</a
            >
            <p class="txt">
              我一直在尋找能帶來成就感的工作。
              <br />朋友建議我可以嘗試寫程式，畢竟我大學主修的是資管，具備一定的邏輯思維基礎。
              <br />一開始從切版做起，發現自己很喜歡把設計具象化的過程，當畫面完整出現在瀏覽器上會有強烈的成就感。
              <br />後來學習
              Vue，更體會到開發過程的架構與邏輯性，這讓我確定，前端是一條我想持續深入的職涯路線。
            </p>
          </div>
          <div class="list">
            <a href="" class="q_title" @click.prevent="isActive"
              >你覺得自己的優勢是什麼？跟其他初中階前端比起來有什麼不同？</a
            >
            <p class="txt">
              我的切版能力強，對細節要求高，可以 1:1 還原設計稿，並補足互動效果讓使用者體驗更完整。
              <br />此外，因為曾經長期負責文書行政與專案流程，我具備溝通與跨部門協作的能力，對細節與時程特別敏感，能降低合作過程的摩擦。這讓我在團隊中不只是一位開發者，也是一個可靠的執行者。
            </p>
          </div>
          <div class="list">
            <a href="" class="q_title" @click.prevent="isActive"
              >如果你加入我們的團隊，期望自己帶來什麼價值？</a
            >
            <p class="txt">
              我希望成為一位可靠的前端夥伴。遇到困難不會只是等待指令，而是主動尋找答案、提出解法。
              <br />雖然我目前還在學習階段，但我能快速吸收新技術並實際應用在專案中。
              <br />如果能加入貴團隊，我會積極學習並貢獻穩定、可維護的前端程式碼，同時配合設計、PM
              共同打造好的產品。
            </p>
          </div>
        </div>
      </div>
      <form @submit.prevent="sendEmail">
        <div class="form-list">
          <label for="">稱呼/公司</label>
          <br /><input type="text" placeholder="請輸入 稱呼/公司" v-model="form.name" required />
        </div>
        <div class="form-list">
          <label for="">E-mail</label>
          <br /><input type="email" placeholder="請輸入聯絡Email" v-model="form.email" required />
        </div>
        <div class="form-list">
          <label for="">聯絡電話</label>
          <br /><input type="phone" placeholder="請輸入聯絡電話" v-model="form.phone" required />
        </div>
        <div class="form-list">
          <label for="">留言</label>
          <br /><textarea
            name=""
            id=""
            placeholder="請輸入內容"
            v-model="form.message"
            required
          ></textarea>
        </div>
        <div class="btn">
          <button type="submit">Sent</button>
        </div>
        <p v-if="status">{{ status }}</p>
      </form>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.contact {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 80%;
  margin: 0 auto;
  padding: 50px 0 100px;
  @include mediaquery(null, 767px) {
    width: 88%;
  }
}
h2 {
  text-align: center;
  font-size: 68px;
  font-weight: 600;
  margin-bottom: 10px;
  color: #212121;
}
h3 {
  font-size: 26px;
  font-weight: 500;
  margin-bottom: 16px;
}
.content {
  display: flex;
  justify-content: space-between;
  @include mediaquery(null, 991px) {
    flex-direction: column;
    justify-content: center;
  }
}
.qaItem {
  flex: 0 0 50%;
  @include mediaquery(null, 991px) {
    margin-bottom: 6%;
  }
  .list {
    position: relative;
    margin-bottom: 20px;
    overflow: hidden;
    &::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 1px;
      background-color: #ccc;
    }
    &::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 1px;
      background-color: #212121;
      transform: translateX(-101%);
      transition: transform 0.5s;
    }
    &:hover::after {
      transform: translateX(0%);
    }
    &.active::after {
      transform: translateX(0%);
    }
    &.active .q_title::after {
      transform: translateY(-50%) rotate(180deg);
    }
    &.active .txt {
      max-height: 500px;
      padding: 10px 0 20px;
    }
  }
  .q_title {
    position: relative;
    display: block;
    font-size: 18px;
    padding: 10px 40px 10px 0;
    @include mediaquery(null, 991px) {
      font-size: 16px;
    }
    &::after {
      content: '';
      position: absolute;
      top: 50%;
      right: 0;
      transform: translateY(-50%);
      width: 24px;
      height: 24px;
      background: url('@/assets/images/down-arrow.png') center / contain no-repeat;
      transition: transform 0.5s;
    }
  }
  .txt {
    max-height: 0;
    overflow: hidden;
    color: #888;
    transition:
      max-height 0.5s ease,
      padding 0.5s ease;
  }
}
form {
  flex: 0 0 40%;
  .btn {
    text-align: right;
  }
  button {
    cursor: pointer;
    font-size: 18px;
    line-height: 18px;
    font-weight: 700;
    padding: 8px 14px;
    border-radius: 5px;
    border: 1px solid #212121;
    background-color: #fff;
    transition: all 0.5s;
    @include mediaquery(null, 991px) {
      font-size: 16px;
      line-height: 16px;
    }
    &:hover {
      background-color: #eee;
      border: 1px solid #fff;
    }
  }
}
.form-list {
  margin-bottom: 20px;
  label {
    display: inline-block;
    margin-bottom: 2px;
    font-size: 18px;
    @include mediaquery(null, 991px) {
      font-size: 16px;
    }
  }
  input {
    width: 100%;
    height: 42px;
    border-radius: 4px;
    border: 1px solid#212121;
    padding: 2px 10px;
    font-size: 16px;
    @include mediaquery(null, 991px) {
      height: 38px;
      font-size: 15px;
    }
    &::placeholder {
      font-size: 16px;
      color: #bbb;
      @include mediaquery(null, 991px) {
        font-size: 15px;
      }
    }
  }
  textarea {
    resize: none;
    width: 100%;
    height: 150px;
    border-radius: 4px;
    border: 1px solid#212121;
    padding: 10px;
    font-size: 16px;
    @include mediaquery(null, 991px) {
      font-size: 15px;
    }
    &::placeholder {
      font-size: 16px;
      color: #bbb;
      @include mediaquery(null, 991px) {
        font-size: 15px;
      }
    }
  }
}
</style>
