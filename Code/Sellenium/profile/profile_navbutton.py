import unittest

from selenium import webdriver
from test_utility import static_data

class UserPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_profile_exam_reg(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("exam-reg").click()

        assert (static_data.base_url + "user/profile/exam-reg") == driver.current_url

    def test_profile_apply_pay(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("exam-reg").click()

        assert (static_data.base_url + "user/profile/apply-pay") == driver.current_url

    def test_profile_foreign_pay(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("exam-reg").click()

        assert (static_data.base_url + "user/profile/for-pay") == driver.current_url

    def test_profile_ret_money(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("exam-reg").click()

        assert (static_data.base_url + "user/profile/ret-mon") == driver.current_url

    def test_profile_int_trans(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile")
        driver.find_element_by_id("exam-reg").click()

        assert (static_data.base_url + "user/profile/int-trans") == driver.current_url

    def test_profile_wallet(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile")
        user_wallet = driver.find_element_by_id("wallet")
        user_wallet.click()
        assert "http://127.0.0.1:8000/profile/wallet" == driver.current_url

    def tearDown(self):
        self.driver.close()
