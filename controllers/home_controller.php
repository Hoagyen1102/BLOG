<?php
class home_controller extends vendor_main_controller {
    public function index() {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $nopp = 10;

        $comments = comment_model::getInstance();
        $marks = mark_model::getInstance();
        $data = post_repository::getAllRecordPagination($page, $nopp);
		$allRecord = post_repository::getAllRecordPublished();
        $records = $data['records'];
        $totalPages = $data['totalPages'];
        $topRecord = post_repository::getTopRecord();
        
        if ($records) {
            $cmt = post_repository::getCounts($allRecord, $comments);
            $mark = post_repository::getCounts($allRecord, $marks);
            $this->setProperty('cmt', $cmt);
            $this->setProperty('mark', $mark);
        }

        $this->setProperty('record', $records);
        $this->setProperty('topRecord', $topRecord);
        $this->setProperty('currentPage', $page);
        $this->setProperty('totalPages', $totalPages);
        $this->display();
		echo json_encode(['success' => true, 'comment' => $cmt]);
    }
}
?>