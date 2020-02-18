import { expect } from 'chai'
import { shallowMount, createLocalVue } from '@vue/test-utils'
import VueRouter from 'vue-router'
import PostList from '@/views/Posts/List.vue'

describe('Post/List.vue', () => {
  /*
  it('renders props.msg when passed', () => {
    const msg = 'new message'
    const wrapper = shallowMount(HelloWorld, {
      propsData: { msg }
    })
    expect(wrapper.text()).to.include(msg)
  })
  */
  it('data initTable', () => {
     const initTableURL = '/admin/post/initTable'
      const localVue = createLocalVue()
      localVue.use(VueRouter)
      const router = new VueRouter()
    const wrapper = shallowMount(PostList, {
        localVue,
        router
    })
      // tim hieu thang wrapper la ntn de con lay duoc gia tri tu do dua ra test
    expect(wrapper.vm.$data.initTableURL).to.equals(initTableURL);
  })
})
