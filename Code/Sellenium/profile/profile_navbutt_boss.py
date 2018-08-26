import unittest

from selenium import webdriver
from test_utility import static_data
from test_utility import fields


class BossPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=boss", "password=bossboss",
                                                    "submit"])[2].click()

    def test_profile_exam_reg(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPayment").click()
        driver.find_element_by_id("exam-reg").click()

        assert "exam-reg" in driver.current_url

    def tearDown(self):
        self.driver.close()
