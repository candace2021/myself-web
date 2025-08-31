import axios from 'axios'
import { ref } from 'vue'

const getWorks = () => {
  const works = ref([])
  const protfolio = ref([])

  const apiURL = async () => {
    try {
      const { data } = await axios('https://rslife.site/api/works.php')
      works.value = data
      protfolio.value = data
    } catch (error) {
      console.log(error)
    }
  }

  return { works, protfolio, apiURL }
}

export default getWorks
