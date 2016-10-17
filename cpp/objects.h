// NOTE: Everything following JS_VALUE_TYPE is considered a
// JSObject for GC purposes. The first four entries here have typeof
// 'object', whereas JS_FUNCTION_TYPE has typeof 'function'.
#define INSTANCE_TYPE_LIST(V)                                   \
  V(STRING_TYPE)                                                \
  V(ONE_BYTE_STRING_TYPE)                                       \
  V(CONS_STRING_TYPE)                                           \
  V(CONS_ONE_BYTE_STRING_TYPE)                                  \
  V(SLICED_STRING_TYPE)                                         \
  V(SLICED_ONE_BYTE_STRING_TYPE)                                \
  V(EXTERNAL_STRING_TYPE)                                       \
  V(EXTERNAL_ONE_BYTE_STRING_TYPE)                              \
  V(EXTERNAL_STRING_WITH_ONE_BYTE_DATA_TYPE)                    \
  V(SHORT_EXTERNAL_STRING_TYPE)                                 \
  V(SHORT_EXTERNAL_ONE_BYTE_STRING_TYPE)                        \
  V(SHORT_EXTERNAL_STRING_WITH_ONE_BYTE_DATA_TYPE)              \
                                                                \
  V(INTERNALIZED_STRING_TYPE)                                   \
  V(ONE_BYTE_INTERNALIZED_STRING_TYPE)                          \
  V(EXTERNAL_INTERNALIZED_STRING_TYPE)                          \
  V(EXTERNAL_ONE_BYTE_INTERNALIZED_STRING_TYPE)                 \
  V(EXTERNAL_INTERNALIZED_STRING_WITH_ONE_BYTE_DATA_TYPE)       \
  V(SHORT_EXTERNAL_INTERNALIZED_STRING_TYPE)                    \
  V(SHORT_EXTERNAL_ONE_BYTE_INTERNALIZED_STRING_TYPE)           \
  V(SHORT_EXTERNAL_INTERNALIZED_STRING_WITH_ONE_BYTE_DATA_TYPE) \
                                                                \
  V(SYMBOL_TYPE)                                                \
  V(SIMD128_VALUE_TYPE)                                         \
                                                                \
  V(MAP_TYPE)                                                   \
  V(CODE_TYPE)                                                  \
  V(ODDBALL_TYPE)                                               \
  V(CELL_TYPE)                                                  \
  V(PROPERTY_CELL_TYPE)                                         \
                                                                \
  V(HEAP_NUMBER_TYPE)                                           \
  V(MUTABLE_HEAP_NUMBER_TYPE)                                   \
  V(FOREIGN_TYPE)                                               \
  V(BYTE_ARRAY_TYPE)                                            \
  V(BYTECODE_ARRAY_TYPE)                                        \
  V(FREE_SPACE_TYPE)                                            \
                                                                \
  V(FIXED_INT8_ARRAY_TYPE)                                      \
  V(FIXED_UINT8_ARRAY_TYPE)                                     \
  V(FIXED_INT16_ARRAY_TYPE)                                     \
  V(FIXED_UINT16_ARRAY_TYPE)                                    \
  V(FIXED_INT32_ARRAY_TYPE)                                     \
  V(FIXED_UINT32_ARRAY_TYPE)                                    \
  V(FIXED_FLOAT32_ARRAY_TYPE)                                   \
  V(FIXED_FLOAT64_ARRAY_TYPE)                                   \
  V(FIXED_UINT8_CLAMPED_ARRAY_TYPE)                             \
                                                                \
  V(FILLER_TYPE)                                                \
                                                                \
  V(ACCESSOR_INFO_TYPE)                                         \
  V(ACCESSOR_PAIR_TYPE)                                         \
  V(ACCESS_CHECK_INFO_TYPE)                                     \
  V(INTERCEPTOR_INFO_TYPE)                                      \
  V(CALL_HANDLER_INFO_TYPE)                                     \
  V(FUNCTION_TEMPLATE_INFO_TYPE)                                \
  V(OBJECT_TEMPLATE_INFO_TYPE)                                  \
  V(SIGNATURE_INFO_TYPE)                                        \
  V(TYPE_SWITCH_INFO_TYPE)                                      \
  V(ALLOCATION_MEMENTO_TYPE)                                    \
  V(ALLOCATION_SITE_TYPE)                                       \
  V(SCRIPT_TYPE)                                                \
  V(TYPE_FEEDBACK_INFO_TYPE)                                    \
  V(ALIASED_ARGUMENTS_ENTRY_TYPE)                               \
  V(BOX_TYPE)                                                   \
  V(PROTOTYPE_INFO_TYPE)                                        \
  V(SLOPPY_BLOCK_WITH_EVAL_CONTEXT_EXTENSION_TYPE)              \
                                                                \
  V(FIXED_ARRAY_TYPE)                                           \
  V(FIXED_DOUBLE_ARRAY_TYPE)                                    \
  V(SHARED_FUNCTION_INFO_TYPE)                                  \
  V(WEAK_CELL_TYPE)                                             \
  V(TRANSITION_ARRAY_TYPE)                                      \
                                                                \
  V(JS_MESSAGE_OBJECT_TYPE)                                     \
                                                                \
  V(JS_VALUE_TYPE)                                              \
  V(JS_DATE_TYPE)                                               \
  V(JS_OBJECT_TYPE)                                             \
  V(JS_ARGUMENTS_TYPE)                                          \
  V(JS_CONTEXT_EXTENSION_OBJECT_TYPE)                           \
  V(JS_GENERATOR_OBJECT_TYPE)                                   \
  V(JS_MODULE_TYPE)                                             \
  V(JS_GLOBAL_OBJECT_TYPE)                                      \
  V(JS_GLOBAL_PROXY_TYPE)                                       \
  V(JS_API_OBJECT_TYPE)                                         \
  V(JS_SPECIAL_API_OBJECT_TYPE)                                 \
  V(JS_ARRAY_TYPE)                                              \
  V(JS_ARRAY_BUFFER_TYPE)                                       \
  V(JS_TYPED_ARRAY_TYPE)                                        \
  V(JS_DATA_VIEW_TYPE)                                          \
  V(JS_PROXY_TYPE)                                              \
  V(JS_SET_TYPE)                                                \
  V(JS_MAP_TYPE)                                                \
  V(JS_SET_ITERATOR_TYPE)                                       \
  V(JS_MAP_ITERATOR_TYPE)                                       \
  V(JS_WEAK_MAP_TYPE)                                           \
  V(JS_WEAK_SET_TYPE)                                           \
  V(JS_PROMISE_TYPE)                                            \
  V(JS_REGEXP_TYPE)                                             \
  V(JS_ERROR_TYPE)                                              \
                                                                \
  V(JS_BOUND_FUNCTION_TYPE)                                     \
  V(JS_FUNCTION_TYPE)                                           \
  V(DEBUG_INFO_TYPE)                                            \
  V(BREAK_POINT_INFO_TYPE)
// Since string types are not consecutive, this macro is used to
// iterate over them.
