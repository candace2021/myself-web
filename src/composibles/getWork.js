import axios from 'axios'
import { ref } from 'vue'

const getWork = (id) => {
  const work = ref([])

  const apiURL = async () => {
    try {
      const { data } = await axios('https://rslife.site/api/works.php/' + id)
      work.value = data
      console.log(data)
    } catch (error) {
      console.log(error)
    }
  }

  return { work, apiURL }
}

export default getWork
