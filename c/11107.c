u32bits nshttp_compute_varlen_appflow_req_size(nsipfix_template_t *tmpl, 
	nspcb_t *pcb, nsipfix_cntrs_t *ipfix_cnt, void *ptr1, void *ptr2) 
{
#define HINFO_NTH_HINX_SIZE(a, b) (HINFO_NTH_HINX_VE(a, b, 0)-HINFO_NTH_HINX_VS(a, b, 0))
	HttpPacketInfo_t *httpInfo = (HttpPacketInfo_t *)(ptr1);
	u32bits i;
	nsipfix_template_element_t *te_ptr;
	u08bits *devName = NULL;

	if (!ptr1) {
		nsipfix_null_varlen_entries(tmpl);
		return 0;
	}
	NSIPFIX_ITER_VARLEN_IES(tmpl, te_ptr) {
		NSIPFIX_SWITCH_VARLEN_IES(te_ptr) {
		case NSIPFIX_DEVNAME:
			NSULF_GET_DEVNAME(devName, pcb);
			if (devName == NULL) {
   				nsipfix_null_varlen_entries(tmpl);
     				break;
      			}
     			NSIPFIX_ADD_LEN_VARLEN_ENTRY(devName, strlen(devName), te_ptr);
      			break;
		case NSIPFIX_HTTP_REQ_URL:
			if (nsipfix_http_url)
				NSIPFIX_ADD_LEN_VARLEN_ENTRY( httpInfo->urlStartp,
					httpInfo->urlLen, te_ptr);
			else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_COOKIE:
			if (nsipfix_http_cookie &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(cookie))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(cookie), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(cookie)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_METHOD:
			if (nsipfix_http_method && httpInfo->reqresType && httpInfo->reqresType <= HTTP_REQ_RPCCONNECT) {
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						method_arr[httpInfo->reqresType - HTTP_REQ_OPTIONS],
						strlen(method_arr[httpInfo->reqresType - HTTP_REQ_OPTIONS]),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_REFERER:
			if (nsipfix_http_referer &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(referer))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(referer), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(referer)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_HOST:
			if (nsipfix_http_host &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(host))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(host), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(host)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_XFORWARDEDFOR:
			if (nsipfix_http_xforwardedfor &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(x_forwarded_for))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(x_forwarded_for), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(x_forwarded_for)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_VIA:
			if (nsipfix_http_via &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(via))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(via), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(via)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_AUTHORIZATION:
			if (nsipfix_http_authorization &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(authorization))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(authorization), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(authorization)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_CONTENT_TYPE:
			if (nsipfix_http_content_type &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(content_type))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(content_type), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(content_type)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_REQ_USERAGENT:
			if (nsipfix_http_user_agent &&
				HINFO_LAST_HINX_EXISTS(httpInfo, _HDR_INX(user_agent))){
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(
						HINFO_NTH_HINX_VSP(httpInfo, _HDR_INX(user_agent), 0),
						HINFO_NTH_HINX_SIZE(httpInfo, _HDR_INX(user_agent)),
						te_ptr);
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_AAA_USERNAME:
			if (nsipfix_aaa_username && IS_SSLVPN_PCB(pcb)) {
				if(IS_CLIENT_PCB(pcb)) {
					u32bits length = (u32bits)(pcb->ns_aaa->session->ulen);
					NSIPFIX_ADD_LEN_VARLEN_ENTRY(
							pcb->ns_aaa->session->username,
							length,
							te_ptr);
				} else {
					u32bits length = (u32bits)(pcb->link->ns_aaa->session->ulen);
					NSIPFIX_ADD_LEN_VARLEN_ENTRY(
							pcb->link->ns_aaa->session->username,
							length,
							te_ptr);
				}
			} else
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		case NSIPFIX_HTTP_DOMAIN_NAME:
			if (nsipfix_http_domain) {
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(httpInfo->domainStartp,
					httpInfo->domainLen, te_ptr);
			} else {
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			}
			break;
		case NSIPFIX_SUBSCRIBER_ID:
			if (subscr_msisdn.len)
				NSIPFIX_ADD_LEN_VARLEN_ENTRY(subscr_msisdn.msisdn, subscr_msisdn.len, te_ptr);
			else 
				NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		default:
			NSIPFIX_ADD_NULL_VARLEN_ENTRY(te_ptr);
			break;
		}
	}
#undef HINFO_NTH_HINX_SIZE
	return 0;
}