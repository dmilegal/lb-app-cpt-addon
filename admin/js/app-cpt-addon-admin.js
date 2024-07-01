;(function ($) {
  'use strict'
  window.addEventListener('load', () => {
    const currentPostType = wp.data.select('core/editor').getCurrentPostType()

    if (currentPostType !== 'lb-application') return

    wp.data.subscribe(() => {
      const isSavingLbCasnoApp = wp.data.select('core/editor').isSavingPost()
      const isAutosavingLbCasnoApp = wp.data.select('core/editor').isAutosavingPost()
      const noticeOperations = wp.data.select('core/notices')
      const noticeTaxId = 'app-type-notice'

      let appType = wp.data.select('core/editor').getEditedPostAttribute('app-type')

      if (!isSavingLbCasnoApp && !isAutosavingLbCasnoApp) {
        // Если есть более одной таксономии 'app-type',
        // оставляем отмеченным только последний выбранный элемент
        if (Array.isArray(appType) && appType.length > 1) {
          appType = [appType[appType.length - 1]]
          wp.data.dispatch('core/editor').editPost({ 'app-type': appType })
        }
      }

      if (
        isSavingLbCasnoApp &&
        !isAutosavingLbCasnoApp &&
        !noticeOperations.getNotices().some((notice) => notice.id === noticeTaxId)
      ) {
        if (!appType || appType.length === 0) {
          wp.data
            .dispatch('core/notices')
            .createErrorNotice(
              'You need to select at least one "Types of Apps" taxonomy.',
              {
                id: noticeTaxId,
                isDismissible: true,
              }
            )

          //wp.data.dispatch('core/editor').undo()
        }
      }

      if (
        noticeOperations.getNotices().some((notice) => notice.id === noticeTaxId) &&
        appType &&
        appType.length > 0
      ) {
        wp.data.dispatch('core/notices').removeNotice(noticeTaxId)
      }
    })

    /////////////////////////////
    const parentNoticeId = 'parent-casino-notice'
    const parentCasinoSelect = acf.getField('field_660b34dd4d17d')
    const parentBookmakerSelect = acf.getField('field_663bd715115ab')

    wp.data.subscribe(() => {
      const isSavingLbCasnoApp = wp.data.select('core/editor').isSavingPost()
      const isAutosavingLbCasnoApp = wp.data.select('core/editor').isAutosavingPost()
      const noticeOperations = wp.data.select('core/notices')

      let val = parentCasinoSelect.val() || parentBookmakerSelect.val()

      if (
        isSavingLbCasnoApp &&
        !isAutosavingLbCasnoApp &&
        !noticeOperations.getNotices().some((notice) => notice.id === parentNoticeId) &&
        !val
      ) {
        wp.data
          .dispatch('core/notices')
          .createErrorNotice('You need to select a parent casino or bookmaker.', {
            id: parentNoticeId,
            isDismissible: true,
          })
      }
    })

    parentCasinoSelect.on('change', function () {
      if (parentCasinoSelect.val())
        wp.data.dispatch('core/notices').removeNotice(parentNoticeId)
    })

    parentBookmakerSelect.on('change', function () {
      if (parentBookmakerSelect.val())
        wp.data.dispatch('core/notices').removeNotice(parentNoticeId)
    })
  })
})(jQuery)
