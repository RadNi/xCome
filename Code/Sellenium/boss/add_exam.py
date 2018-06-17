import time
import unittest
from selenium import webdriver
from test_utility import static_data, fields


class AddExam(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_add_exam(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile/exam-reg")
        driver.find_element_by_id("addExam").click()
        exam_attr = fields.get_components_by_name(driver, ["exam-type=russian", "exam-price=100", "exam-fee=110",
                                                           "exam-date", "add"])
        exam_attr[3].click()
        exam_attr[3].send_keys("2020-03-22")
        exam_attr[4].click()
        assert driver.find_element_by_id("successful") is not None

    def test_add_exam_price_format(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile/exam-reg")
        driver.find_element_by_id("addExam").click()
        exam_attr = fields.get_components_by_name(driver, ["exam-type=russian", "exam-price=1s00", "exam-fee=110",
                                                           "exam-date", "add"])
        exam_attr[3].click()
        exam_attr[3].send_keys("2020-03-22")
        exam_attr[4].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_add_exam_date(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile/exam-reg")
        driver.find_element_by_id("addExam").click()
        exam_attr = fields.get_components_by_name(driver, ["exam-type=russian", "exam-price=1s00", "exam-fee=110",
                                                           "exam-date", "add"])
        exam_attr[3].click()
        exam_attr[3].send_keys("2010-03-22")
        exam_attr[4].click()
        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
