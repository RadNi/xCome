import unittest

from selenium import webdriver
from test_utility import static_data


class BossPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_profile_exam_reg(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/profile")
        driver.find_element_by_id("exam-reg").click()

        assert (static_data.base_url + "boss/profile/exam-reg") == driver.current_url

    def tearDown(self):
        self.driver.close()
