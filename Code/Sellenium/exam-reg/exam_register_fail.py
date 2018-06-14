import unittest

from selenium import webdriver
from test_utility import static_data, fields


class ExamRegister(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_exam_reg_fail_1(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/exam-reg")
        driver.find_element_by_id("exam1").find_element_by_id("buy-butt").click()

        assert driver.find_element_by_id("inValid") is not None

    def test_exam_reg_fail_2(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/exam-reg")
        driver.find_element_by_id("exam2").find_element_by_id("buy-butt").click()

        assert driver.find_element_by_id("inValid") is not None

    def test_exam_reg_fail_3(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/exam-reg")
        driver.find_element_by_id("exam3").find_element_by_id("buy-butt").click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
