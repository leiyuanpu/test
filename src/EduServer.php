<?php
/**
 * Created by SDK Builder.
 * Date: 2017-12-29
 * Time: 18:06:10
 */

namespace MeiSha\Education;

/**
 * @apiDefine EduServer 教务对接
 */
class EduServer
{
    //config
    const SERVER_DEV_HOST  = 'https://test-evaluate2.meishakeji.com'; //测试环境
    const SERVER_PROD_HOST = 'https://evaluate2.meishakeji.com'; //正式环境
    const SERVER_SELF_HOST = 'https://lumen-evaluateadmin.meishakeji.com'; //自己的环境

    const GET_CLASS_LIST_BY_CAMPUS  = '/api/education_open/term/list'; //根据校区获取班级列表
    const GET_CLASS_BY_ID           = '/api/education_open/term/detail'; //根据班级id获取班级详情
    const GET_CLASS_BY_IDS          = '/api/education_open/term/detail_list'; //根据班级id获取班级详情 s
    const GET_CLASS_MINI_BY_IDS     = '/api/education_open/term/detail_mini_list'; //根据班级id获取班级详情 s
    const GET_CLASS_BY_TEACHER      = '/api/education_open/teacher/teacher_class'; //根据老师id获取班级
    const GET_TEACHER_BY_CAMPUS     = '/api/education_open/teacher/campus_teacher'; //根据校区获取教师
    const GET_TEACHER_BY_TEAM       = '/api/education_open/teacher/team_teacher'; //根据团队获取教师
    const GET_TEACHER_BY_CLASS      = '/api/education_open/teacher/class_teacher'; //根据班级获取教师
    const GET_TEACHER_BY_ID         = '/api/education_open/teacher/detail'; //获取教师详情
    const GET_TEACHER_BY_IDS        = '/api/education_open/teacher/detail_list'; //获取教师详情 s
    const GET_TEACHER_MINI_BY_IDS   = '/api/education_open/teacher/detail_mini_list'; //获取教师详情 s
    const GET_TEACHER_PHONE_NO      = '/api/education_open/teacher/detail_by_phone_no'; //根据手机号码获取教师详情
    const GET_STUDENT_BY_ID         = '/api/education_open/student/student_detail'; //学生详情
    const GET_STUDENT_BY_IDS        = '/api/education_open/student/student_detail_by_ids'; //学生详情 s
    const GET_STUDENT_BY_CAMPUS     = '/api/education_open/student/campus_student'; //根据校区获取学生列表
    const GET_STUDENT_BY_CLASS      = '/api/education_open/student/class_student'; //根据班级获取学生列表
    const GET_STUDENT_BY_STUDENT_NO = '/api/education_open/student/student_detail_by_no'; //根据学号获取详情
    const GET_CLASS_LIST_BY_STUDENT = '/api/education_open/student/class_list'; //获取学生的所在班级列表
    const GET_STUDENT_USER_IDS      = '/api/education_open/student/student_user_ids'; //获取学生关联的用户列表
    const GET_ORDER_REFUND_DETAIL   = '/api/education_open/order/refund_detail'; //获取订单退款信息
    const GET_CLASS_BASE_DETAIL     = '/api/education_open/class/detail'; //获取班级基础信息
    const GET_CLASS_BASE_GET_LIST   = '/api/education_open/class/get_list'; //获取mini班级list

    const PRIVATE_KEY = 'd0bb80aabb8619b6e35113f02e72752b';

    private static $_env;

    public static function setEnv($env)
    {
        self::$_env = $env;
    }

    public static function getEnv()
    {
        return self::$_env;
    }

    /**
     * @api {GET} /api/education_open/term/list 根据校区获取班级列表
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"count":126,"classList":[{"id":"d67bec64ee04c4a8","campName":"","termName":"123111","campusName":"淘金营地New ","teamName":"淘金营地New ","sales":1,"typeName":"全日制学校","times":123,"arrangedTimes":1,"isSendEvaluate":0}]}}
     */
    public static function getClassListByCampusId($campusId, $searchField, $nowPage, $perPageCount, $classType = 0, $teamId = '')
    {
        $data = json_encode(['campusId' => $campusId, 'teamId' => $teamId, 'classType' => $classType, 'searchField' => $searchField, 'perPageCount' => $perPageCount, 'nowPage' => $nowPage]);
        return self::_request(self::GET_CLASS_LIST_BY_CAMPUS, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"detail":{"id":"d67bec64ee04c4a8","campName":"","termName":"123111","campusName":"淘金营地New ","campusSerial":"09","teamId":"dc1bdea9e74f175c","times":123,"period":0,"sales":1,"type":1,"beginTime":"0","endTime":"0","typeName":"全日制学校","classroomList":[{"id":"ac9a166dd5c6ea94","name":"123"}],"teacherList":[{"id":"332","name":"江小鱼","isClassTeacher":0}],"studentList":[],"classTeacher":[],"semesterId":"semester_1","semesterName":"2017年春季学期","attendanceType":2,"attendanceRule":5,"teamName":"淘金营地New ","campusId":"01360712b6c9e466","arrangedTimes":1},"ruleList":[],"lessonList":[{"id":"37266b8eb6bd3360","name":"12342314","classTime":"12月12日 周二 05:10-05:45","beginClassTime":1513026600,"endClassTime":1513028700,"teacherNameList":"江小鱼","classroomInfo":"123","studentNum":"0/1","attendanceStudentNum":0,"status":"已完成","conflict":""}],"studentList":[{"studentId":"1335927e742ee030","name":"撒大声地","avatar":"evaluate/picture/test/c7aa755af131f426.jpeg","beginTime":"未排课","endTime":"未排课","saleCount":123,"arrangedCount":1,"usedCount":0,"remainedCount":123,"attendedCount":0,"leavedCount":0,"absenceCount":0}]}}
     */
    public static function getClassByClassId($classId)
    {
        $data = json_encode(['classId' => $classId]);
        return self::_request(self::GET_CLASS_BY_ID, self::_buildParam($data));
    }

    public static function getClassByClassIds($classIds)
    {
        $data = json_encode(['classId' => $classIds]);
        return self::_request(self::GET_CLASS_BY_IDS, self::_buildParam($data));
    }

    public static function getMiniClassByClassIds($classIds)
    {
        $data = json_encode(['classId' => $classIds]);
        return self::_request(self::GET_CLASS_MINI_BY_IDS, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"teacherList":[{"id":"338","role":1,"avatar":"","realName":"dylan梅沙书院","phoneNo":"15768082770","aggregation":"dylan梅沙书院 15768082770 梅沙书院","sex":1,"nickName":"","isActivate":0,"team":"梅沙书院","teamId":"F853AEDC776CD679","teachingLesson":"","introduction":"","characteristic":"","group":[],"isAdmin":0}],"allCount":1}}
     */
    public static function getTeacherListByCampusId($campusId, $searchField, $nowPage, $perPageCount)
    {
        $data = json_encode(['campusId' => $campusId, 'searchField' => $searchField, 'perPageCount' => $perPageCount, 'nowPage' => $nowPage]);
        return self::_request(self::GET_TEACHER_BY_CAMPUS, self::_buildParam($data));
    }

    public static function getTeacherListByTeamId($teamId, $searchField, $nowPage, $perPageCount)
    {
        $data = json_encode(['teamId' => $teamId, 'searchField' => $searchField, 'perPageCount' => $perPageCount, 'nowPage' => $nowPage]);
        return self::_request(self::GET_TEACHER_BY_TEAM, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":[{"id":"332","name":"江小鱼"}]}
     */
    public static function getTeacherListByClassId($classId)
    {
        $data = json_encode(['classId' => $classId]);
        return self::_request(self::GET_TEACHER_BY_CLASS, self::_buildParam($data));
    }

    /**
     * @param $teacherId
     * @return array|mixed
     */
    public static function getClassListByTeacherId($teacherId, $classType = 0)
    {
        $data = json_encode(['teacherId' => $teacherId, 'classType' => $classType]);
        return self::_request(self::GET_CLASS_BY_TEACHER, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"id":"265","role":1,"avatar":"users/avatar/wechat/b27bf70c0f8b6efb69b2d5d13fc5f175.png","realName":"lumen","phoneNo":"13828436704","aggregation":"lumen 13828436704 都市华庭营地","sex":1,"nickName":"LU","isActivate":1,"team":"都市华庭营地","teamId":"217BAC406C281733","teachingLesson":"","introduction":"","characteristic":"","group":[],"isAdmin":0}}
     */
    public static function getTeacherByTeacherId($teacherId)
    {
        $data = json_encode(['teacherId' => $teacherId]);
        return self::_request(self::GET_TEACHER_BY_ID, self::_buildParam($data));
    }

    public static function getTeacherByTeacherIds($teacherIds)
    {
        $data = json_encode(['teacherId' => $teacherIds]);
        return self::_request(self::GET_TEACHER_BY_IDS, self::_buildParam($data));
    }

    public static function getMiniTeacherByTeacherIds($teacherIds)
    {
        $data = json_encode(['teacherId' => $teacherIds]);
        return self::_request(self::GET_TEACHER_MINI_BY_IDS, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"id":"265","role":1,"avatar":"users/avatar/wechat/b27bf70c0f8b6efb69b2d5d13fc5f175.png","realName":"lumen","phoneNo":"13828436704","aggregation":"lumen 13828436704 都市华庭营地","sex":1,"nickName":"LU","isActivate":1,"team":"都市华庭营地","teamId":"217BAC406C281733","teachingLesson":"","introduction":"","characteristic":"","group":[],"isAdmin":0}}
     */
    public static function getTeacherByPhoneNo($phoneNo)
    {
        $data = json_encode(['phoneNo' => $phoneNo]);
        return self::_request(self::GET_TEACHER_PHONE_NO, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"camperId":"1335927e742ee030","name":"撒大声地","phoneNo":"18977662222","avatar":"evaluate/picture/test/c7aa755af131f426.jpeg","relationName":"","sex":2,"height":0,"weight":0,"bootSize":0,"idCard":"532800197612034625","passport":"","taiwanId":"","hkMcId":"","birthDate":19970716,"allergicHistory":"","province":"","city":"","district":"","address":"","strongPoint":"","urgencyContactPhone":"","urgencyContactName":"","remark":""}}
     */
    public static function getStudentById($studentId)
    {
        $data = json_encode(['studentId' => $studentId]);
        return self::_request(self::GET_STUDENT_BY_ID, self::_buildParam($data));
    }

    public static function getStudentByIds($studentIds)
    {
        $data = json_encode(['studentId' => $studentIds]);
        return self::_request(self::GET_STUDENT_BY_IDS, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"camperId":"6e90c2bc724fa2cc","name":"卡卡","phoneNo":"13152569854","avatar":"users/avatar/app/2017/12/22/2017122249880.jpg","relationName":"","sex":2,"height":153,"weight":34,"bootSize":310,"idCard":"445281199508055616","passport":"loyjkonoo","taiwanId":"36985686644455","hkMcId":"3698239","birthDate":20090518,"allergicHistory":"无没有","province":"110000","city":"110100","district":"110102","address":"313","strongPoint":"","urgencyContactPhone":"13112312312","urgencyContactName":"131","remark":"没有呀"}}
     */
    public static function getStudentByStudentNo($studentNo)
    {
        $data = json_encode(['studentNo' => $studentNo]);
        return self::_request(self::GET_STUDENT_BY_STUDENT_NO, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     *{"code":0,"msg":"success","data":[{"id":"1335927e742ee030","name":"撒大声地"},{"id":"1f3946c3eae13e2f","name":"12、6"},{"id":"fdef636f41fe0742","name":"官天津"}]}
     */
    public static function getStudentListByCampusId($campusId, $searchField, $perPageCount, $nowPage)
    {
        $data = json_encode(['campusId' => $campusId, 'searchField' => $searchField, 'perPageCount' => $perPageCount, 'nowPage' => $nowPage]);
        return self::_request(self::GET_STUDENT_BY_CAMPUS, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":[{"studentId":"7ff8e35416308db1","id":"7ff8e35416308db1","name":"xxxxxx","avatar":"evaluate/images/girl.png","beginTime":"1970-01-01","endTime":"1970-01-01"}]}
     */
    public static function getStudentListByClass($classId)
    {
        $data = json_encode(['classId' => $classId]);
        return self::_request(self::GET_STUDENT_BY_CLASS, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":[{"campusSerial":"17","campusName":"梅沙教育","list":[{"className":"贤哥的班","classId":"02a82a509ace6286","campName":"","termName":"贤哥的班","arrangedTimes":14,"overTimes":10}]},{"campusSerial":"11","campusName":"江泰路万科里营地","list":[{"className":"班级动态测试-动态班级","classId":"c598924564d10987","campName":"班级动态测试","termName":"动态班级","arrangedTimes":3,"overTimes":3},{"className":"培训测试1班","classId":"19b63c814cb570f9","campName":"","termName":"培训测试1班","arrangedTimes":16,"overTimes":10}]},{"campusSerial":"00","campusName":"梅沙营地","list":[{"className":"全日制学校主题城市的主题梅沙科技团队课程-梅沙科技实验幼儿园总裁一班","classId":"950a5e49b89c694a","campName":"全日制学校主题城市的主题梅沙科技团队课程","termName":"梅沙科技实验幼儿园总裁一班","arrangedTimes":11,"overTimes":11}]}]}
     */
    public static function getClassListByStudentId($studentId, $classType = 0)
    {
        $data = json_encode(['studentId' => $studentId, 'classType' => $classType]);
        return self::_request(self::GET_CLASS_LIST_BY_STUDENT, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/vod/manage/video_list 获取视频地址
     * @apiParam {string} campusId 校区id
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":[{"campusSerial":"17","campusName":"梅沙教育","list":[{"className":"贤哥的班","classId":"02a82a509ace6286","campName":"","termName":"贤哥的班","arrangedTimes":14,"overTimes":10}]},{"campusSerial":"11","campusName":"江泰路万科里营地","list":[{"className":"班级动态测试-动态班级","classId":"c598924564d10987","campName":"班级动态测试","termName":"动态班级","arrangedTimes":3,"overTimes":3},{"className":"培训测试1班","classId":"19b63c814cb570f9","campName":"","termName":"培训测试1班","arrangedTimes":16,"overTimes":10}]},{"campusSerial":"00","campusName":"梅沙营地","list":[{"className":"全日制学校主题城市的主题梅沙科技团队课程-梅沙科技实验幼儿园总裁一班","classId":"950a5e49b89c694a","campName":"全日制学校主题城市的主题梅沙科技团队课程","termName":"梅沙科技实验幼儿园总裁一班","arrangedTimes":11,"overTimes":11}]}]}
     */
    public static function getStudentUserIds($studentId)
    {
        $data = json_encode(['studentId' => $studentId]);
        return self::_request(self::GET_STUDENT_USER_IDS, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/education_open/order/refund_detail 获取订单退款信息
     * @apiParam {string} orderId 订单ID
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"orderBalance":0}}
     */
    public static function getOrderRefundDetail($orderId)
    {
        $data = json_encode(['orderId' => $orderId]);
        return self::_request(self::GET_ORDER_REFUND_DETAIL, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/education_open/class/detail 获取班级基础信息
     * @apiParam {[]string} classIds 班级IDs
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":{"83D7231DAFEF9CCB":{"id":"83D7231DAFEF9CCB","name":"\u6570\u5b66","studentList":[{"studentId":"7ea065997872b90e","studentName":"\u5f20\u5f20\u534e","avatar":"evaluate\/images\/boy.png"},{"studentId":"7403fcc2b7cd2caf","studentName":"\u5b98will3","avatar":"evaluate\/images\/boy.png"}],"teacherList":[{"id":265,"name":"lumen"},{"id":412,"name":"will"}],"classTeacher":[{"id":412,"name":"will"}]},"68b2ddc2e6a9c7eb":{"id":"68b2ddc2e6a9c7eb","name":"\u963f\u65af\u987f","studentList":[{"studentId":"1ea20e6fd8026764","studentName":"\u6d4b\u8bd52.0\u5b66\u5458","avatar":"evaluate\/images\/boy.png"},{"studentId":"6e90c2bc724fa2cc","studentName":"\u5361\u5361","avatar":"users\/avatar\/app\/2017\/12\/22\/2017122249880.jpg"},{"studentId":"27b959bebf74fc0f","studentName":"\u5f20\u5927\u534e2","avatar":"evaluate\/images\/boy.png"},{"studentId":"565a2250faeede3a","studentName":"\u8521\u8292\u679c","avatar":"evaluate\/picture\/test\/f7a992d8a5e47c19.png"}],"teacherList":[{"id":412,"name":"will"}],"classTeacher":[{"id":412,"name":"will"}]}}}
     */
    public static function getClassBaseDetail(array $classIds)
    {
        $data = json_encode(['classIds' => $classIds]);
        return self::_request(self::GET_CLASS_BASE_DETAIL, self::_buildParam($data));
    }

    /**
     * @api {GET} /api/education_open/class/get_list open获取mini班级列表
     * @apiParam {[]string} companyId 团队id
     * @apiParam {[]string} className 班级名
     * @apiParamExample {json} 返回
     * {"code":0,"msg":"success","data":[{"id":"0E6290452A7D969A","name":"Mini B\u73ed"},{"id":"102b62ced6852ebb","name":"campusmini\u526f\u672c-\u4ed8\u8d39\u9879"},{"id":"34f912c2ac434251","name":"1124sandy\u7684\u5168\u65e5\u5236mini-1124\u5168\u65e5\u5236\u4ed8\u8d39\u9879"},{"id":"5b71254992fde261","name":"campusmini\u526f\u672c-\u4ed8\u8d39\u98792"},{"id":"E8A8820795E8F8DD","name":"mini A"},{"id":"FBFAB85A262BD48F","name":"Mini A\u73ed"}]}
     */
    public static function getClassBaseGetList($companyId, $className, $classType = 0)
    {
        $data = json_encode(['companyId' => $companyId, 'className' => $className, 'classType' => $classType]);
        return self::_request(self::GET_CLASS_BASE_GET_LIST, self::_buildParam($data));
    }

    protected static function _request($uri, $data, $post = false)
    {
        if (empty(self::$_env) || (self::$_env != 'prod' && self::$_env != 'local' && self::$_env != 'self')) {
            return [
                'code' => '-1',
                'msg'  => 'please set env first',
            ];
        }

        if (self::$_env == 'prod') {
            $host = self::SERVER_PROD_HOST;
        } elseif (self::$_env == 'local') {
            $host = self::SERVER_DEV_HOST;
        } elseif (self::$_env == 'self') {
            $host = self::SERVER_SELF_HOST;
        } else {
            $host = '';
        }

        if ($post) {
            $url = $host . $uri;
            $retData = self::_httpPost($url, $data);
        } else {
            if (is_array($data)) {
                $data = http_build_query($data);
            }
            $url = $host . $uri . '?' . 'data=' . $data;
            $retData = self::_httpGet($url);
        }

        if ($retData) {
            return json_decode($retData, true);
        } else {
            return [];
        }
    }

    protected static function _buildParam()
    {
        $varArray = func_get_args(); //获取参数，返回参数数组
        $varArray[] = 'key=' . self::PRIVATE_KEY;
        return implode('&', $varArray);
    }

    protected static function _httpGet($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $output = curl_exec($ch);
        return $output;
    }

    protected static function _httpPost($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $output = curl_exec($ch);
        return $output;
    }

}

//
//EduServer::setEnv('local');
//var_dump(EduServer::getClassByClassId('d67bec64ee04c4a8'));
//var_dump(EduServer::getStudentByIds(['f2b5f20e3d14b996']));
//var_dump(EduServer::getStudentListByClass('f4a9dd74de133b8f'));